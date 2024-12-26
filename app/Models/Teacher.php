<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $fillabale = ['name', 'firstname','email', 'password', 'phone', 'expertise'];

    public function course(): HasOne
    {
        return $this->hasOne(Course::class, 'course');
    }
}
