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
    private ActivityServiceInterface $activityService;
    private ActivityIndexDTOFactoryInterface $activityIndexDTOFactory;
    private ActivityStoreDTOFactoryInterface $activityStoreDTOFactory;
    private ActivityUpdateDTOFactoryInterface $activityUpdateDTOFactory;

    public function __construct(
        ActivityServiceInterface $activityService,
        ActivityIndexDTOFactoryInterface $activityIndexDTOFactory,
        ActivityStoreDTOFactoryInterface $activityStoreDTOFactory,
        ActivityUpdateDTOFactoryInterface $activityUpdateDTOFactory
    ) {
        $this->activityService = $activityService;
        $this->activityIndexDTOFactory = $activityIndexDTOFactory;
        $this->activityStoreDTOFactory = $activityStoreDTOFactory;
        $this->activityUpdateDTOFactory = $activityUpdateDTOFactory;
    }

    public function index(ActivityIndexRequest $request): JsonResponse
    {
        $dto = $this->activityIndexDTOFactory->createFromRequest($request);
        $activities = $this->activityService->listActivities($dto);
        return response()->json($activities);
    }

    public function store(ActivityStoreRequest $request): JsonResponse
    {
        try {
            $dto = $this->activityStoreDTOFactory->createFromRequest($request);
            $dto->userId = Auth::id();
            $activity = $this->activityService->createActivity($dto);
            return response()->json($activity, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function show(Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($activity);
    }

    public function update(ActivityUpdateRequest $request, Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $dto = $this->activityUpdateDTOFactory->createFromRequest($request);
        $dto->userId = Auth::id();
        $updatedActivity = $this->activityService->updateActivity($activity, $dto);
        return response()->json($updatedActivity);
    }

    public function destroy(Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $this->activityService->deleteActivity($activity);
        return response()->json(null, 204);
    }
}
