<?php

namespace App\Http\Controllers;
use App\Models\LikeModel;
use App\Models\SavedModel;
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
            'post' => PostModel::where('userid', Auth()->user()->id)->get(),
            'albums' => AlbumModel::where('userid', Auth()->user()->id)->get()->count(),
        ]);
    }
    public function newpost(){
return view('Client.newpost',[
    'albums' => AlbumModel::where('userid', Auth()->user()->id)->get(),
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
    public function otherprofile(User $username, Request $r){
        $data = PostModel::where('userid', $username->id)->get();
        $page = $r->input('page');
     if(isset($page) && $page == 'albums'){
 $data = AlbumModel::where('userid', $username->id)->get();
 $page = 'true';
         }
         return view('Client.Profile',[
             'data' => $data,
             'input' => $page,
             'profile' => User::find($username->id),
             'post' => PostModel::where('userid', $username->id)->get(),
             'albums' => AlbumModel::where('userid', $username->id)->get()->count(),
             'likes' => 0,
         ]);
    }
    public function detailposts(User $username){
        return view('Client.detail',[
            'data' => PostModel::where('userid', $username->id)->get(),
        ]);
    }
    public function detailalbum(AlbumModel $id){
        return view('Client.detailalbum',[
            'data' => PostModel::where('albumid', $id->id)->get(),
            'album' => $id->album_name
        ]);
    }
    public function _detailposts(PostModel $uuid){
         return  redirect('/posts/details/'. $uuid->postUsers->username.'#'.$uuid->uuid);
    }
    public function search(Request $r){
$users = User::all();
$posts = PostModel::all();
$albums = AlbumModel::all();
$in = null;
$i = $r->input('s');
if(isset($i)){
    $posts = PostModel::where('location', 'like', "%$i%")
    ->orWhere('description', 'like', "%$i%")
    ->get();
    $users = User::where('username', 'like', "%$i%")
    ->orWhere('fullname', 'like', "%$i%")
    ->orWhere('email', 'like', "%$i%")
    ->get();
    $albums = AlbumModel::where('album_name', 'like', "%$i%")->get();
    $in = $i;
}
        return view('Client.search',[
            'users' => $users,
            'posts' => $posts,
            'albums' => $albums,
            'i' => $in
        ]);
    }
public function _like(Request $r){
$r = $r->validate([
    'userid' => 'required',
    'postid' => 'required'
]);
LikeModel::create($r);
return redirect()->back();
}
public function _unlike(Request $r){

    $model = LikeModel::where('userid', $r->userid)
    ->where('postid', $r->postid);
$model->delete();
    return redirect()->back();
    }
    public function _save(Request $r){
        $r = $r->validate([
            'userid' => 'required',
            'postid' => 'required'
        ]);
        SavedModel::create($r);
        return redirect()->back();
        }
        public function _unsave(Request $r){
        
            $model = SavedModel::where('userid', $r->userid)
            ->where('postid', $r->postid);
        $model->delete();
            return redirect()->back();
            }
    public function _search(Request $r){
        return redirect('/search?s='.$r->search);
    }
    public function saved(){
        return view('Client.savedpost',[
            'data' => SavedModel::where('userid',(int)Auth()->user()->id)->get(),
        ]);
    }
    public function _delete(PostModel $uuid){
        Storage::delete($uuid->image);
$uuid->delete();
return back();
    }
}

