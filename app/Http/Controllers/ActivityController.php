<?php

namespace App\Http\Controllers;

use App\Factories\Activity\Contracts\ActivityIndexDTOFactoryInterface;
use App\Factories\Activity\Contracts\ActivityStoreDTOFactoryInterface;
use App\Factories\Activity\Contracts\ActivityUpdateDTOFactoryInterface;
use App\Http\Requests\Activity\ActivityIndexRequest;
use App\Http\Requests\Activity\ActivityStoreRequest;
use App\Http\Requests\Activity\ActivityUpdateRequest;
use App\Models\Activity;
use App\Services\Activity\Contracts\ActivityServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ActivityController extends Controller
{

    public function __construct(
        private readonly ActivityServiceInterface $activityServiceInterface,
        private readonly ActivityIndexDTOFactoryInterface $activityIndexDTOFactoryInterface,
        private readonly ActivityStoreDTOFactoryInterface $activityStoreDTOFactoryInterface,
        private readonly ActivityUpdateDTOFactoryInterface $activityUpdateDTOFactoryInterface
    ) {
    }
    public function index(ActivityIndexRequest $request): JsonResponse
    {
        $dto = $this->activityIndexDTOFactoryInterface->createFromRequest($request);
        $activities = $this->activityServiceInterface->listActivities($dto);
        return response()->json($activities);
    }

    public function store(ActivityStoreRequest $request): JsonResponse
    {
        try {
            // $validatedData = $request->validate([
            //     'title' => 'required|string|max:255',
            //     'type' => 'required|string|max:255',
            //     'description' => 'nullable|string',
            //     'start_date' => 'required|date|after_or_equal:today',
            //     'due_date' => 'required|date|after_or_equal:start_date',
            //     'completion_date' => 'nullable|date|after_or_equal:start_date',
            //     'status' => 'required|in:open,completed',
            // ]);

            // $errors = [];
            // $locale = app()->getLocale();

            // $startDayOfWeek = Carbon::parse($validatedData['start_date'])->locale($locale)->dayName;
            // $dueDayOfWeek = Carbon::parse($validatedData['due_date'])->locale($locale)->dayName;

            // if (in_array(Carbon::parse($validatedData['start_date'])->dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY], true)) {
            //     $errors['start_date'] = ["The start date cannot be a weekend (falls on {$startDayOfWeek})."];
            // }

            // if (in_array(Carbon::parse($validatedData['due_date'])->dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY], true)) {
            //     $errors['due_date'] = ["The due date cannot be a weekend (falls on {$dueDayOfWeek})."];
            // }

            // if ($errors !== []) {
            //     throw ValidationException::withMessages($errors);
            // }

            // $startDateOverlaps = Activity::where('user_id', Auth::id())
            //     ->whereBetween('start_date', [$validatedData['start_date'], $validatedData['due_date']])
            //     ->exists();

            // $dueDateOverlaps = Activity::where('user_id', Auth::id())
            //     ->whereBetween('due_date', [$validatedData['start_date'], $validatedData['due_date']])
            //     ->exists();

            // $overlapErrors = [];

            // if ($startDateOverlaps) {
            //     $overlapErrors['start_date'] = ['The user already has an activity starting in this period.'];
            // }

            // if ($dueDateOverlaps) {
            //     $overlapErrors['due_date'] = ['The user already has an activity ending in this period.'];
            // }

            // if ($overlapErrors !== []) {
            //     throw ValidationException::withMessages($overlapErrors);
            // }

            // // Create the activity.
            // $validatedData['user_id'] = Auth::id();
            // $activity = Activity::create($validatedData);

            $dto = $this->activityStoreDTOFactoryInterface->createFromRequest($request);
            $activity = $this->activityServiceInterface->createActivity($dto);

            return response()->json($activity, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function show(Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => Activity::UNAUTHORIZED], 403);
        }

        return response()->json($activity);
    }

    public function update(ActivityUpdateRequest $request, Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => Activity::UNAUTHORIZED], 403);
        }

        $dto = $this->activityUpdateDTOFactoryInterface->createFromRequest($request);
        $activity = $this->activityServiceInterface->updateActivity($activity, $dto);
        return response()->json($activity);
    }

    public function destroy(Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => Activity::UNAUTHORIZED], 403);
        }

        $activity->delete();
        return response()->json(null, 204);
    }
}
