<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $title
 *
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 */
class Activity extends Model
{
    use HasFactory;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
