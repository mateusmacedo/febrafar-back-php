<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
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
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder whereBetween($column, array $values, $boolean = 'and', $not = false)
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
     * @var array
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
