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
            // Validate the incoming request data.
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
            $locale = app()->getLocale();

            $startDayOfWeek = Carbon::parse($validatedData['start_date'])->locale($locale)->dayName;
            $dueDayOfWeek = Carbon::parse($validatedData['due_date'])->locale($locale)->dayName;

            if (in_array(Carbon::parse($validatedData['start_date'])->dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY], true)) {
                $errors['start_date'] = ["The start date cannot be a weekend (falls on {$startDayOfWeek})."];
            }

            if (in_array(Carbon::parse($validatedData['due_date'])->dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY], true)) {
                $errors['due_date'] = ["The due date cannot be a weekend (falls on {$dueDayOfWeek})."];
            }

            if ($errors !== []) {
                throw ValidationException::withMessages($errors);
            }

            /** @phpstan-ignore-next-line */
            $startDateOverlaps = Activity::where('user_id', $validatedData['user_id'])
                ->whereBetween('start_date', [$validatedData['start_date'], $validatedData['due_date']])
                ->exists();
            /** @phpstan-ignore-next-line */
            $dueDateOverlaps = Activity::where('user_id', $validatedData['user_id'])
                ->whereBetween('due_date', [$validatedData['start_date'], $validatedData['due_date']])
                ->exists();

            $overlapErrors = [];

            if ($startDateOverlaps) {
                $overlapErrors['start_date'] = ['The user already has an activity starting in this period.'];
            }

            if ($dueDateOverlaps) {
                $overlapErrors['due_date'] = ['The user already has an activity ending in this period.'];
            }

            if ($overlapErrors !== []) {
                throw ValidationException::withMessages($overlapErrors);
            }

            // Create the activity.
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
