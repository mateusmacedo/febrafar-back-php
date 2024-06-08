<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Activity;
use Illuminate\Validation\ValidationException;

class ActivityService
{
    protected function checkOverlapping($userId, $startDate, $endDate)
    {
        $overlapping = Activity::checkOverlapping($userId, $startDate, $endDate);

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
        $filters = compact('startDate', 'endDate');

        return Activity::filter($filters)->get();
    }
}
