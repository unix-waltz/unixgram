<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use App\Models\PostModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('Client.index',[
            'data' => PostModel::all(),
        ]);
    }
    public function profile($username){
        return view('Client.Profile');
    }
    public function newpost(){
return view('Client.newpost',[
    'albums' => AlbumModel::all(),
]);
    }
    public function _newpost(Request $r){
$valid = $r->validate([
    'location' => 'nullable|max:25',
    'image' => 'required|image',
    'userid' => 'required',
    'description' => 'nullable|max:666',
    'albumid' => 'nullable',
    'uuid' => 'required'
]);
$valid['image'] = $r->file('image')->store('/posts');
PostModel::create($valid);
return redirect('/');

    }
    public function _album(Request $r){
       $r = $r->validate([
    'userid' => 'required',
    'album_name' => 'required|unique:albums'
        ]);
        AlbumModel::create($r);
        return redirect()->back();
    }
}
