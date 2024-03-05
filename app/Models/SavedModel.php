<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedModel extends Model
{
    use HasFactory;
    protected $table = 'saveds';
    protected $guarded =['id'];
}
