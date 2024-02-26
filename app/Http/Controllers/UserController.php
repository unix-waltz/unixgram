<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('Client.index');
    }
    public function profile($username){
        return view('Client.Profile');
    }
}
