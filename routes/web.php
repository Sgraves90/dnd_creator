<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

Route::get('/', function () {return view('welcome');});
Route::get('home', function () {return view('sessions.home');} )->name('home');;
Route::get('create_character', function () {return view('sessions.create_character');});
Route::post('api_functions', function () {return view('api_modules.api_functions');});
Route::post('save_character', function () {return view('sessions.save_character');});
Route::post('delete_character', function () {return view('sessions.delete_character');});
Route::get('my_characters', function () {return view('sessions.my_characters');});


//register user
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');


//login
Route::get('login',[SessionsController::class,'create']);
Route::post('login',[SessionsController::class,'store']);

Route::get('logout',[SessionsController::class,'destroy']);

//Route::get('/url','controller@function') -> middleware('cors');
//Route::get()

//temp home check
//Route::get('home',function (){return view ('sessions.home');});

