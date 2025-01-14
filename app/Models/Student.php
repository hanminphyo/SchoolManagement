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
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class);
    }
}
