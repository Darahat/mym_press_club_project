<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
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
    Route::get('/edit/{id}', [BannerController::class, 'edit']);
    Route::put('/update/{id}', [BannerController::class, 'update']);
    Route::put('/delete/{id}', [BannerController::class, 'destroy']);
});
