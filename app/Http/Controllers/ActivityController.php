<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('start_date', [$request->start_date, $request->end_date]);
        }

        $activities = $query->get();

        return response()->json($activities);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'description' => 'nullable|string',
                'user_id' => 'required|exists:users,id',
                'start_date' => 'required|date|after_or_equal:today',
                'due_date' => 'required|date|after_or_equal:start_date',
                'completion_date' => 'nullable|date|after_or_equal:start_date',
                'status' => 'required|in:open,completed',
            ]);
        } catch (ValidationException $e) {
            Log::error('Validation Error:', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        }

        // Verificar se as datas são finais de semana
        if (
            in_array(Carbon::parse($validatedData['start_date'])->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY]) ||
            in_array(Carbon::parse($validatedData['due_date'])->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY])
        ) {
            return response()->json(['error' => 'Activities cannot be scheduled on weekends.'], 422);
        }

        // Verificar sobreposição de datas
        $overlapping = Activity::where('user_id', $validatedData['user_id'])
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('start_date', [$validatedData['start_date'], $validatedData['due_date']])
                    ->orWhereBetween('due_date', [$validatedData['start_date'], $validatedData['due_date']]);
            })
            ->exists();

        if ($overlapping) {
            return response()->json(['error' => 'There is a conflicting activity for this date range.'], 422);
        }

        $activity = Activity::create($validatedData);
        return response()->json($activity, 201);
    }

    public function show(Activity $activity)
    {
        return response()->json($activity);
    }

    public function update(Request $request, Activity $activity)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'sometimes|required|exists:users,id',
            'start_date' => 'sometimes|required|date',
            'due_date' => 'sometimes|required|date|after_or_equal:start_date',
            'completion_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:open,completed',
        ]);

        $activity->update($validatedData);
        return response()->json($activity);
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->json(null, 204);
    }
}
