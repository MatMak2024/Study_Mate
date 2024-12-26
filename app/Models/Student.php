<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = ['name', 'firstname', 'gender', 'birth_date', 'email','phone','adress', 'course_id'];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'course');
    }

    public function progress(): HasOne
    {
        return $this->hasOne(Progress::class, 'progress');
    }

    public function enrollment(): HasOne
    {
        return $this->hasOne(Enrollement::class, 'enrollment');
    }
}
