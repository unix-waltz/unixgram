<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $guarded =['id'];
    public function postUsers(){
        return $this->belongsTo(User::class,'userid','id');
    }
    public function postLikes(){
        return $this->hasMany(LikeModel::class,'postid','id');
    }
}
