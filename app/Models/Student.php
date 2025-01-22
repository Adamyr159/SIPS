<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = ['id', 'name', 'gender', 'nisn', 'class_id', 'date_of_birth', 'status'];
    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
