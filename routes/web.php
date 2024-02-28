<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth'])->group(function(){
Route::get('/logout', [AuthController::class, 'logout']);
});
 Route::get('/',[UserController::class,'index']);
Route::middleware(['guest'])->group(function(){
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'LoginView'])->name('login');
Route::post('/login', [AuthController::class, 'Login']);
});
// users route  
Route::middleware(['auth'])->group(function(){
    Route::get('/myprofile/{username}',[UserController::class,'profile']);
    Route::get('/post/new',[UserController::class,'newpost']);
    Route::post('/post/new',[UserController::class,'_newpost']);
    Route::post('/album/new',[UserController::class,'_album']);

}); 

Route::fallback(function(){
    return view('error.404');
});
