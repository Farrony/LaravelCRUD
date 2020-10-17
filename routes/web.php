<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('post', 'App\Http\Controllers\PostController');
Auth::routes();


// Route::get('/profile', function(){
//     return view('post.profile');
// })->middleware(['auth','email_verified']);  // multiple middleware

Route::group(['middleware' => ['auth','email_verified']], function () {
    Route::get('/profile', 'App\Http\Controllers\HomeController@profile');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->withoutMiddleware('email_verified');
});

// Route::get('/profile', 'App\Http\Controllers\HomeController@profile');
