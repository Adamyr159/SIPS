<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
class Teacher extends Model
{
    public function classSubject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class, 'class_id');
    }
    
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
