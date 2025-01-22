<?php

namespace App\Models;

use App\Models\ClassSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $fillable = ['id', 'name'];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subjects');
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(ClassSubject::class, 'class_subjects');
    }

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
