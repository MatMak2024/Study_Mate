<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = ['decimal', 'statut'];


    public function course(): HasOne
    {
        return $this->hasOne(Course::class, 'course');
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'student');
    }


}
