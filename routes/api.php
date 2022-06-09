<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/article', [UserController::class, 'index']);
 
 
Route::namespace('BannerController')->group(function () {
    Route::get('/banners', [BannerController::class, 'index']);
    Route::post('/banner/store', [BannerController::class, 'store']);
    Route::get('/show/{id}', [BannerController::class, 'show']);
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit']);
    Route::post('/banner/update/{id}', [BannerController::class, 'update']);
    Route::put('/banner/delete/{id}', [BannerController::class, 'destroy']);
    Route::get('/menus', [MenuController::class, 'index']);
    Route::post('/menu/store', [MenuController::class, 'store']);
    Route::get('/menu/show/{name}', [MenuController::class, 'show']);
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit']);
    Route::post('/menu/update/{id}', [MenuController::class, 'update']);
    Route::put('/menu/delete/{id}', [MenuController::class, 'destroy']);
    Route::get('/subMenus', [subMenuController::class, 'index']);
    Route::post('/subMenu/store', [subMenuController::class, 'store']);
    Route::get('/subMenu/show/{id}', [subMenuController::class, 'show']);
    Route::get('/subMenu/edit/{id}', [subMenuController::class, 'edit']);
    Route::post('/subMenu/update/{id}', [subMenuController::class, 'update']);
    Route::put('/subMenu/delete/{id}', [subMenuController::class, 'destroy']);
});
