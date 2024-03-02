<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\AlbumModel;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        return view('Client.index',[
            'data' => PostModel::all(),
        ]);
    }
    public function profile($username, Request $r){
        $data = PostModel::where('userid', Auth()->user()->id)->get();
       $page = $r->input('page');
    if(isset($page) && $page == 'albums'){
$data = AlbumModel::where('userid', Auth()->user()->id)->get();
$page = 'true';
        }
        return view('Client.Profile',[
            'data' => $data,
            'input' => $page,
            'profile' => User::find(Auth()->user()->id),
            'post' => PostModel::where('userid', Auth()->user()->id)->get()->count(),
            'albums' => AlbumModel::where('userid', Auth()->user()->id)->get()->count(),
            'likes' => 0,
        ]);
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
    public function setting(){
return view('Client.setting',[
    'data' => User::where('id',Auth()->user()->id)->first(),
]);
    }
    public function _setting(Request $r){
        $v = $r->validate([
'fullname' => 'required',
'email' => 'required',
'username' => 'required',
'bio' => 'nullable|max:600',
'profilephoto' => 'image|nullable',
        ]);
        if($r->file('profilephoto')){
            if($r->oldimg){
                Storage::delete($r->oldimg);
            }
            $v['profilephoto'] = $r->file('profilephoto')->store('/profile');
        }
User::find(Auth()->user()->id)->update($v);

return redirect('/myprofile/@'.Auth()->user()->username.'?page=posts');
    }
}
