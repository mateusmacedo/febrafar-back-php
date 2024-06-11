<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @OA\Schema(
 *     schema="Activity",
 *     required={"title", "type", "user_id", "start_date", "due_date", "status"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="The ID of the activity"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="The title of the activity",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         description="The type of the activity",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="The description of the activity"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="The ID of the user associated with the activity"
 *     ),
 *     @OA\Property(
 *         property="start_date",
 *         type="string",
 *         format="date",
 *         description="The start date of the activity"
 *     ),
 *     @OA\Property(
 *         property="due_date",
 *         type="string",
 *         format="date",
 *         description="The due date of the activity"
 *     ),
 *     @OA\Property(
 *         property="completion_date",
 *         type="string",
 *         format="date",
 *         description="The completion date of the activity"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         enum={"open", "completed"},
 *         description="The status of the activity"
 *     ),
 * )
 *
 * Activity model.
 *
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string|null $description
 * @property int $user_id
 * @property Carbon $start_date
 * @property Carbon $due_date
 * @property Carbon|null $completion_date
 * @property string $status
 * @property-read User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder whereBetween($column, array $values, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Eloquent\Model|$this create(array $attributes = [])
 */
class Activity extends Model
{
    use HasFactory;

    const UNAUTHORIZED = 'unauthorized';
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'type',
        'description',
        'user_id',
        'start_date',
        'due_date',
        'completion_date',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'datetime',
        'due_date' => 'datetime',
        'completion_date' => 'datetime',
    ];

    /**
     * Get the user that owns the activity.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
