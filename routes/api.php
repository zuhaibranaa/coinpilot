<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BookingController;
use App\Http\Controllers\api\DappController;
use App\Http\Controllers\api\LikeController;
use App\Http\Controllers\api\SlotController;
use App\Http\Controllers\api\WatchlistController;


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


Route::post('register', [AuthController::class,'Register']);
Route::post('login', [AuthController::class,'login']);
Route::post('logout', [AuthController::class,'logout']);
Route::resource('booking', BookingController::class);
Route::resource('dapp', DappController::class);
Route::resource('like', LikeController::class);
Route::resource('slot', SlotController::class);
Route::resource('watchlist', WatchlistController::class);
