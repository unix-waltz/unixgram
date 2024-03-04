<?php

namespace App\Models;

use App\Models\User;
use App\Models\PostModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlbumModel extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $guarded = ['id'];
    public function albumPosts(){
        return $this->hasMany(PostModel::class,'albumid','id');
    }
    public function albumUser(){
        return $this->belongsTo(User::class,'userid','id');
    }
}
