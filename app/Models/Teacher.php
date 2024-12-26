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
        'password',
        'course_id',
    ];
    public function group()
    {
        return $this->hasMany(Group::class);
    }
    // public function courses()
    // {
    //     return $this->belongsTo(Course::class);
    // }
}
