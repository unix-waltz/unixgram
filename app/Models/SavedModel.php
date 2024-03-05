<?php

namespace App\Models;

use App\Models\PostModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavedModel extends Model
{
    use HasFactory;
    protected $table = 'saveds';
    protected $guarded =['id'];
    public function savedPosts(){
        return $this->belongsTo(PostModel::class,'postid','id');
    }
}
