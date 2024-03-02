<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $guarded = ['id'];
    public function albumPosts(){
        return $this->hasMany(PostModel::class,'albumid','id');
    }
}
