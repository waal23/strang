<?php

use App\Http\Controllers\AgoraVideoController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::post('getUser',[UserController::class,'getUser'])->middleware('checkHeader');
Route::post('blockUserForUser',[UserController::class,'blockUserForUser'])->middleware('checkHeader');

Route::post('editUser',[UserController::class,'editUser'])->middleware('checkHeader');

Route::post('searchCall',[UserController::class,'searchCall'])->middleware('checkHeader');
Route::post('destroy',[UserController::class,'destroy'])->middleware('checkHeader');
Route::post('getconnecteduser',[UserController::class,'getconnecteduser'])->middleware('checkHeader');

Route::post('token',[UserController::class,'token'])->middleware('checkHeader');
Route::post('updateGender',[UserController::class,'updateGender'])->middleware('checkHeader');
Route::post('addReport',[ReportController::class,'addReport'])->middleware('checkHeader');
Route::post('getFackUser',[UserController::class,'getFackUser'])->middleware('checkHeader');
Route::post('getSettingData',[SettingController::class,'getSettingData'])->middleware('checkHeader');
Route::post('getPackage',[PackageController::class,'getPackage'])->middleware('checkHeader');
Route::post('addCoins',[UserController::class,'addCoins'])->middleware('checkHeader');
Route::post('removeCoins',[UserController::class,'removeCoins'])->middleware('checkHeader');
Route::post('removeUser',[UserController::class,'removeUser'])->middleware('checkHeader');
