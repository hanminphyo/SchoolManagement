<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course_id',
        'image',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
