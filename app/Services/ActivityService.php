<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Activity;
use Illuminate\Validation\ValidationException;

class ActivityService
{
    protected function checkOverlapping($userId, $startDate, $dueDate)
    {
        $query = Activity::where('user_id', $userId)
            ->where(function ($query) use ($startDate, $dueDate) {
                if ($startDate && $dueDate) {
                    $query->where(function ($query) use ($startDate, $dueDate) {
                        $query->whereBetween('start_date', [$startDate, $dueDate])
                            ->orWhereBetween('due_date', [$startDate, $dueDate]);
                    });
                } elseif ($startDate) {
                    $query->where('start_date', '>=', $startDate);
                } elseif ($dueDate) {
                    $query->where('due_date', '<=', $dueDate);
                }

            });

        $overlapping = $query->exists();

        if ($overlapping) {
            throw ValidationException::withMessages(['dates' => 'There is a conflicting activity for this date range.']);
        }
    }

    public function store(array $data)
    {
        $this->checkOverlapping($data['user_id'], $data['start_date'], $data['due_date']);

        return Activity::create($data);
    }

    public function update(array $data, Activity $activity)
    {
        $startDate = $data['start_date'] ?? null;
        $dueDate = $data['due_date'] ?? null;
        if ($startDate && $dueDate) {
            $this->checkOverlapping($activity->user_id, $startDate, $dueDate);
        }

        $activity->update($data);

        return $activity;
    }

    public function delete($activityId)
    {
        $activity = Activity::findOrFail($activityId);

        $activity->delete();
    }

    public function get(string $startDate = null, string $endDate = null)
    {
        $query = Activity::query();

        if ($startDate) {
            $query->where('start_date', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('start_date', '<=', $endDate);
        }

        return $query->get();
    }
}
