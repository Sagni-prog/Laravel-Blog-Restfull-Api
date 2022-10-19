<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['article_title','article_body'];
    
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function image(){
        return $this->morphOne(Image::class,'imagable');
    }
}
