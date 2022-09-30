<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogpostController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\Api\SpeakerController;
use App\Http\Controllers\Api\LectureNameController;
use App\Http\Controllers\Api\RoomController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('blogposts', BlogpostController::class);
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('settings', SettingController::class);
Route::apiResource('events', EventController::class);
Route::apiResource('lectures', LectureController::class);
Route::apiResource('speakers', SpeakerController::class);
Route::apiResource('lectureNames', LectureNameController::class);
Route::apiResource('rooms', RoomController::class);