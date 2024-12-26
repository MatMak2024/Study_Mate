<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = ['name', 'description',];

    public function student(): belongsToMany
    {
        return $this->belongsToMany(Student::class, 'student');
    }

    public function teacher(): HasMany
    {
        return $this->hasMany(Teacher::class, 'teacher');
    }

    public function chapter(): HasMany
    {
        return $this->hasMany(Chapter::class, 'chapter');
    }

    public function progress(): HasMany
    {
        return $this->hasMany(Progress::class, 'progress');
    }

    public function enrollement(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'enrollment');
    }
}
