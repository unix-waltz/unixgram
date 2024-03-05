<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeModel extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $guarded =['id'];
    public function likeUser(){
        return $this->belongsTo(User::class,'userid','id');
    }
}
