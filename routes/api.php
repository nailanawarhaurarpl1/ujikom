<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('register', [LoginController::class, 'register']);
Route::post('register', [LoginController::class, 'registerapi']);

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login',[LoginController::class, 'loginApi']);
    Route::put('member/edit/{id}', [LoginController::class, 'updateUser']);    
    Route::get('me',[LoginController::class, 'me']);
    Route::post('logout',[LoginController::class, 'logout']);

    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function ($router){
    Route::get('user', [AdminController::class , 'nambah']);
});