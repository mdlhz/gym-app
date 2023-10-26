<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    use HasFactory;

    public function scheduledClasses(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ScheduledClass::class, 'class_type_id');
    }
}
