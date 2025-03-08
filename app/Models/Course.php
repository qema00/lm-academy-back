<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description', 
        'intro_video_url',
        'intro_image_url',
        'status',
        'nr_of_files',
        'duration',
        'created_by',
        'updated_by'
    ];

    public function createdBy()  {
        return $this -> belongsTo(User::class,'created_by')->selectUserName();
    }

    public function updatedBy()  {
        return $this -> belongsTo(User::class,'created_by')->selectUserName();
    }
}
