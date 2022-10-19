<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\LoginController;
// use App\Http\Controllers\Authenticate;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeController;

// Route::post('/note/register', [Authenticate::class, 'store'])->name('/note/register');

// Route::post('user/login',[Authenticate::class, 'loginUser'])->name('user/login');


Route::post('/person/register', [AuthController::class, 'store'])->name('/me/register');

Route::post('person/login',[AuthController::class, 'loginUser'])->name('person/login');




// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/',[ArticleController::class,'index']);
// });
