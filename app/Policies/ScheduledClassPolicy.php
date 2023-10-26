<?php

namespace App\Policies;

use App\Models\User;

class ScheduledClassPolicy
{
    public function delete(User $user, ScheduleClass $scheduleClass): bool
    {
        return $user->id === $scheduleClass->instructor_id;
    }
}
