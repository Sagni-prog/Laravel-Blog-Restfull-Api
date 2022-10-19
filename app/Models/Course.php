<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_title'];
    // public function teachers(){
    //     return $this->belongsToMany(Teacher::class);
    // }

    public function coursable(){
        return $this->morphToMany(Teacher::class,'coursable');
    }
}
