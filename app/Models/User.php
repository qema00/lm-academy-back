<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserInfo;
use App\Models\UserList;
use App\Models\Course;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_email',
        'gender',
        'email',
        'password',
        'image',
        'date_of_birth',
        'academic_year',
        'acc_status',
        'profile_completed',  

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeSelectSomeUserData($query){
        return $query->select('users.id','last_name','gender','email','image');
    }

    public function scopeSelectSomeUserName($query){
        return $query->select('users.id','first_name','last_name');
    }

    public function UserInfo(){
        return $this->hasOne(UserInfo::class,'user_id','id');
    }

    public function lists(){
        return $this->belongsToMany(UserList::class,'user_list_items','user_id','list_id')->withinTimestamps();
    }

    public function scoreOnScoreboard(){
       return $this->hasOne(Scoreboard::class,'user_id');
    }


    // COURSES PART
    public function createdCourse(){
        return $this->hasMoney(Course::class,'created_by');
    }

    public function updatedCourse(){
        return $this->hasMoney(Course::class,'updated_by');
    }

    public function createdCourseMaterials(){
        return $this->hasMoney(CourseMaterial::class,'created_by');
    }

    public function updatedCourseMaterials(){
        return $this->hasMoney(CourseMaterial::class,'updated_by');
    }
}
