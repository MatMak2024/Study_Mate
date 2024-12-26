<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enrollment extends Model
{
    protected $fillable = ['statut'];


    public function course(): HasOne
    {
        return $this->hasOne(Course::class, 'course');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'student');
    }
}
