<?php

namespace App\Http\Controllers;

use App\Models\AlbumModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('Client.index');
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
        return $r;
    }
    public function _album(Request $r){
       $r = $r->validate([
            'album_name' => 'required|unique:albums'
        ]);
        AlbumModel::create($r);
        return redirect()->back();
    }
}
