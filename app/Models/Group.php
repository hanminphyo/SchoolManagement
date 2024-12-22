<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'course_id',
        'day_in_a_week',
        'time',
        'start_date',
        'end_date',
    ];

    public function teacher()
    {
        return $this->belongsTo
        (Teacher::class, 'teacher_id');
    }
    public function course()
    {
        return $this->belongsTo
        (Course::class, 'course_id');
    }
}
