<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\DriverController;
use App\Http\Controllers\Api\V1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PackageController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>'auth:sanctum'], function () {
route::apiResource('Package',PackageController::class);

route::apiResource('Drivers',DriverController::class)->middleware('abilities:Driver');

route::apiResource('Order',OrderController::class);
});

Route::Post('register',[AuthController::class ,'register']);

Route::Post('login',[AuthController::class ,'login']);


Route::post('logout/{user}',[AuthController::class ,'logout'])->middleware('auth:sanctum');