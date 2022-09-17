<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/aa',function(){
    return view('index');
});
	//Auth
	Route::get('/login', [AuthenticationController::class,'index']);
	Route::post('/Authenticated',[AuthenticationController::class,'Authenticated']);
	Route::get('/Logout',[AuthenticationController::class,'Logout']);
	Route::post('/Password',[AuthenticationController::class,'updatePassword']);
    Route::post('/HPassword',[AuthenticationController::class,'HPassword']);
	Route::get('/GetUser',[AuthenticationController::class,'getDataUser']);
    Route::get('api/getuser', [AuthenticationController::class,'getuser']);
    Route::post('api/getlog', [AuthenticationController::class,'getlog']);
    Route::get('api/getlog', [AuthenticationController::class,'getlogs']);
