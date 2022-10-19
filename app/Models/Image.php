<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [ 
                            'user_id',
                            'photo_name',
                            'photo_path',
                            'photo_url',
                            'width',
                            'height'
                        ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
