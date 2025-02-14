<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course_id',
        'phone',
        'address',
        'image',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,)->withDefault();
    }
    public function getCourseNameAttribute()
    {
        return $this->course ? $this->course->name : 'No Course Assigned';
    }
    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class);
    }
}
