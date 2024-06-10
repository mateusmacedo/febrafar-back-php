<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ActivityController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Activity::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            /** @var Builder $query */
            $query->whereBetween(
                'start_date',
                [
                    $request->input('start_date'),
                    $request->input('end_date')
                ]
            );
        }

        $activities = $query->get();

        return response()->json($activities);
    }

    public function store(Request $request): JsonResponse
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
            $errors = [];

            if (
                in_array(Carbon::parse($validatedData['start_date'])->dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY], true) ||
                in_array(Carbon::parse($validatedData['due_date'])->dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY], true)
            ) {
                throw ValidationException::withMessages([
                    'start_date' => ['The start date cannot be a weekend.'],
                    'due_date' => ['The due date cannot be a weekend.'],
                ]);
            }

            /** @phpstan-ignore-next-line */
            $startDateOverlaps = Activity::where('user_id', $validatedData['user_id'])
                ->whereBetween('start_date', [$validatedData['start_date'], $validatedData['due_date']])
                ->exists();

            if ($startDateOverlaps) {
                $errors['start_date'] = ['The user already has an activity starting in this period.'];
            }

            /** @phpstan-ignore-next-line */
            $dueDateOverlaps = Activity::where('user_id', $validatedData['user_id'])
                ->whereBetween('due_date', [$validatedData['start_date'], $validatedData['due_date']])
                ->exists();

            if ($dueDateOverlaps) {
                $errors['due_date'] = ['The user already has an activity ending in this period.'];
            }

            if ($errors !== []) {
                throw ValidationException::withMessages($errors);
            }

            $activity = Activity::create($validatedData);

            return response()->json($activity, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function show(Activity $activity): JsonResponse
    {
        return response()->json($activity);
    }

    public function update(Request $request, Activity $activity): JsonResponse
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

    public function destroy(Activity $activity): JsonResponse
    {
        $activity->delete();
        return response()->json(null, 204);
    }
}
