<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserCourseSectionProgress extends Model
{
    protected $fillable = [
        'user_id',
        'course_section_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function courseSection() {
        return $this->belongsTo(CourseSection::class, 'course_id');
    }
}
