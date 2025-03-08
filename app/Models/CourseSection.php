<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    protected $fillable = [
        'module_id',
        'title', 
        'description',
        'nr_of_files',
        'duration'
    ];
    public function module (){
        return $this->belongsTo(CoursemModule::class,'module_id');
    }
    public function materials (){
        return $this->hasMany(CourseMaterial::class,'course_section_id');
    }
}
