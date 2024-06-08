<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function checkOverlapping($userId, $startDate, $endDate)
    {
        return Activity::where('user_id', $userId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('start_date', [$startDate, $endDate])
                        ->orWhereBetween('due_date', [$startDate, $endDate])
                        ->orWhere(function ($query) use ($startDate, $endDate) {
                            $query->where('start_date', '<=', $startDate)
                                ->where('due_date', '>=', $endDate);
                        });
                });
            })
            ->exists();
    }


    public function hasOverlappingActivity($userId, $startDate, $endDate)
    {
        return Activity::checkOverlapping($userId, $startDate, $endDate);
    }

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['startDate'], function ($query, $startDate) {
            $query->where('start_date', '>=', $startDate);
        });

        $query->when($filters['endDate'], function ($query, $endDate) {
            $query->where('start_date', '<=', $endDate);
        });

        return $query;
    }
}
