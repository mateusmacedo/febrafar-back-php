<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityFilterRequest;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Info(title="Agenda API", version="1.0")
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth"
 * )
 */
class ActivityController extends Controller
{
    public function __construct(private readonly ActivityService $activityService)
    {
    }

    /**
     * @OA\Get(
     *     path="/api/activities",
     *     tags={"Activities"},
     *     summary="Listar atividades",
     *     @OA\Parameter(
     *         name="start_date",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string", format="date"),
     *         description="Data de início para filtrar atividades"
     *     ),
     *     @OA\Parameter(
     *         name="end_date",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string", format="date"),
     *         description="Data de término para filtrar atividades"
     *     ),
     *     @OA\Response(response=200, description="Listagem de atividades"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function index(ActivityFilterRequest $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $activities = $this->activityService->get($start_date, $end_date);

        return response()->json($activities);
    }

    /**
     * @OA\Post(
     *     path="/api/activities",
     *     tags={"Activities"},
     *     summary="Criar nova atividade",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="type", type="string"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="user_id", type="integer"),
     *                 @OA\Property(property="start_date", type="string", format="date-time"),
     *                 @OA\Property(property="due_date", type="string", format="date-time"),
     *                 @OA\Property(property="status", type="string"),
     *                 example={"title": "Test Activity", "type": "Custom Type", "description": "Description for test activity", "user_id": 1, "start_date": "2024-06-08 06:13:03", "due_date": "2024-06-09 06:13:03", "status": "open"}
     *             )
     *         )
     *     ),
     *     @OA\Response(response=201, description="Atividade criada com sucesso"),
     *     @OA\Response(response=422, description="Erro de validação"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function store(ActivityStoreRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $activity = $this->activityService->store($validatedData);
            return response()->json($activity, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/activities/{id}",
     *     tags={"Activities"},
     *     summary="Mostrar uma atividade",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detalhes da atividade"),
     *     @OA\Response(response=404, description="Atividade não encontrada"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function show(Activity $activity)
    {
        return response()->json($activity);
    }

    /**
     * @OA\Put(
     *     path="/api/activities/{id}",
     *     tags={"Activities"},
     *     summary="Atualizar uma atividade",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="title", type="string"),
     *                 @OA\Property(property="type", type="string"),
     *                 @OA\Property(property="description", type="string"),
     *                 @OA\Property(property="user_id", type="integer"),
     *                 @OA\Property(property="start_date", type="string", format="date-time"),
     *                 @OA\Property(property="due_date", type="string", format="date-time"),
     *                 @OA\Property(property="completion_date", type="string", format="date-time"),
     *                 @OA\Property(property="status", type="string"),
     *                 example={"title": "Updated Activity", "type": "Custom Type", "description": "Updated description for activity", "user_id": 1, "start_date": "2024-06-08 06:13:03", "due_date": "2024-06-09 06:13:03", "completion_date": "2024-06-10 06:13:03", "status": "open"}
     *             )
     *         )
     *     ),
     *     @OA\Response(response=200, description="Atividade atualizada com sucesso"),
     *     @OA\Response(response=422, description="Erro de validação"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        try {
            $validatedData = $request->validated();
            $activity = $this->activityService->update($validatedData, $activity);
            return response()->json($activity);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/activities/{id}",
     *     tags={"Activities"},
     *     summary="Deletar uma atividade",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=204, description="Atividade deletada com sucesso"),
     *     @OA\Response(response=404, description="Atividade não encontrada"),
     *     security={{"bearerAuth":{}}}
     * )
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->json(null, 204);
    }
}
