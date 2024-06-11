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

/**
 * @OA\Tag(name="Activities")
 */
class ActivityController extends Controller
{
    public function __construct(
        private readonly ActivityServiceInterface $activityService,
        private readonly ActivityIndexDTOFactoryInterface $activityIndexDTOFactory,
        private readonly ActivityStoreDTOFactoryInterface $activityStoreDTOFactory,
        private readonly ActivityUpdateDTOFactoryInterface $activityUpdateDTOFactory
    ) {
    }


    /**
     * @OA\Get(
     *     path="/api/activities",
     *     tags={"Activities"},
     *     summary="List all activities",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="start_date",
     *         in="query",
     *         description="The start date of the activity period",
     *         required=false,
     *         @OA\Schema(
     *             ref="#/components/schemas/ActivityIndexRequest/properties/start_date"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="end_date",
     *         in="query",
     *         description="The end date of the activity period",
     *         required=false,
     *         @OA\Schema(
     *             ref="#/components/schemas/ActivityIndexRequest/properties/end_date"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of activities",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Activity"))
     *     )
     * )
     */
    public function index(ActivityIndexRequest $request): JsonResponse
    {
        $dto = $this->activityIndexDTOFactory->createFromRequest($request);
        $activities = $this->activityService->listActivities($dto);
        return response()->json($activities);
    }

    /**
     * @OA\Post(
     *     path="/api/activities",
     *     tags={"Activities"},
     *     summary="Create a new activity",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivityStoreRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Activity created",
     *         @OA\JsonContent(ref="#/components/schemas/Activity")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(type="object", @OA\Property(property="errors", type="array", @OA\Items(type="string")))
     *     )
     * )
     */
    public function store(ActivityStoreRequest $request): JsonResponse
    {
        try {
            $dto = $this->activityStoreDTOFactory->createFromRequest($request);
            $activity = $this->activityService->createActivity($dto);
            return response()->json($activity, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/activities/{id}",
     *     tags={"Activities"},
     *     summary="Get a specific activity",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Activity details",
     *         @OA\JsonContent(ref="#/components/schemas/Activity")
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized",
     *         @OA\JsonContent(type="object", @OA\Property(property="error", type="string"))
     *     )
     * )
     */
    public function show(Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => Activity::UNAUTHORIZED], 403);
        }

        return response()->json($activity);
    }

    /**
     * @OA\Put(
     *     path="/api/activities/{id}",
     *     tags={"Activities"},
     *     summary="Update a specific activity",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ActivityUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Activity updated",
     *         @OA\JsonContent(ref="#/components/schemas/Activity")
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized",
     *         @OA\JsonContent(type="object", @OA\Property(property="error", type="string"))
     *     )
     * )
     */
    public function update(ActivityUpdateRequest $request, Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => Activity::UNAUTHORIZED], 403);
        }

        $dto = $this->activityUpdateDTOFactory->createFromRequest($request);
        $updatedActivity = $this->activityService->updateActivity($activity, $dto);
        return response()->json($updatedActivity);
    }

    /**
     * @OA\Delete(
     *     path="/api/activities/{id}",
     *     tags={"Activities"},
     *     summary="Delete a specific activity",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Activity deleted"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized",
     *         @OA\JsonContent(type="object", @OA\Property(property="error", type="string"))
     *     )
     * )
     */
    public function destroy(Activity $activity): JsonResponse
    {
        if ($activity->user_id !== Auth::id()) {
            return response()->json(['error' => Activity::UNAUTHORIZED], 403);
        }

        $this->activityService->deleteActivity($activity);
        return response()->json(null, 204);
    }
}
