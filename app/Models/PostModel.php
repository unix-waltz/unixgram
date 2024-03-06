<?php

namespace App\Models;

use App\Models\User;
use App\Models\LikeModel;
use App\Models\SavedModel;
use App\Models\CommentModel;
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
    public function postSaves(){
        return $this->hasMany(SavedModel::class,'postid','id');
    }
    public function postComments(){
        return $this->hasMany(CommentModel::class,'postid','id');
    }
}
