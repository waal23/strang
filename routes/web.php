<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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



Route::get('/',[LoginController::class,'login']);
Route::view('index', 'index')->middleware(['checkLogin'])->name('index');
Route::post('login',[LoginController::class,'checklogin'])->middleware(['checkLogin'])->name('login');
Route::get('logout',[LoginController::class,'logout'])->middleware(['checkLogin'])->name('logout');



Route::view('users','users')->middleware(['checkLogin'])->name('users');

Route::post('fetchAllUsers', [UserController::class,'fetchAllUsers'])->middleware(['checkLogin'])->name('fetchAllUsers');
Route::get('blockUser/{id}', [UserController::class,'blockUser'])->middleware(['checkLogin'])->name('blockUser');
Route::get('unblockUser/{id}', [UserController::class,'unblockUser'])->middleware(['checkLogin'])->name('unblockUser');


/*|--------------------------------------------------------------------------|
  | package  Route                                                           |
  |--------------------------------------------------------------------------|*/

  Route::view('package', 'package')->name('package')->middleware(['checkLogin']);
  Route::post('fetchAllPackage', [PackageController::class,'fetchAllPackage'])->middleware(['checkLogin'])->name('fetchAllPackage');
  Route::post('addPackage', [PackageController::class,'addPackage'])->middleware(['checkLogin'])->name('addPackage');
  Route::post('updatePackage', [PackageController::class,'updatePackage'])->middleware(['checkLogin'])->name('updatePackage');
  Route::get('getPackageById/{id}', [PackageController::class,'getPackageById'])->middleware(['checkLogin'])->name('getPackageById');
  Route::get('deletePackage/{id}', [PackageController::class,'deletePackage'])->middleware(['checkLogin'])->name('deletePackage');


  /*|--------------------------------------------------------------------------|
  | fackuser  Route                                                           |
  |--------------------------------------------------------------------------|*/

  Route::view('fackuser', 'fackuser')->name('fackuser')->middleware(['checkLogin']);
  Route::post('fetchAllFackuser', [UserController::class,'fetchAllFackuser'])->middleware(['checkLogin'])->name('fetchAllFackuser');
  Route::post('addFackuser', [UserController::class,'addFackuser'])->middleware(['checkLogin'])->name('addFackuser');
  Route::post('updateFackuser', [UserController::class,'updateFackuser'])->middleware(['checkLogin'])->name('updateFackuser');
  Route::get('getFackuserById/{id}', [UserController::class,'getFackuserById'])->middleware(['checkLogin'])->name('getFackuserById');
  Route::get('deleteFackuser/{id}', [UserController::class,'deleteFackuser'])->middleware(['checkLogin'])->name('deleteFackuser');

/*|--------------------------------------------------------------------------|
  | setting  Route                                                           |
  |--------------------------------------------------------------------------|*/

  Route::view('setting', 'setting')->name('setting')->middleware(['checkLogin']);

Route::get('admob', [SettingController::class,'getAdmob'])->middleware(['checkLogin'])->name('admob');
Route::get('fb', [SettingController::class,'getFb'])->middleware(['checkLogin'])->name('fb');
Route::get('misc', [SettingController::class,'getMisc'])->middleware(['checkLogin'])->name('misc');
Route::get('social', [SettingController::class,'getSocial'])->middleware(['checkLogin'])->name('social');
Route::get('getGender', [SettingController::class,'getGender'])->middleware(['checkLogin'])->name('getGender');

Route::post('admob', [SettingController::class,'updateAdmob'])->middleware(['checkLogin'])->name('admob');
Route::post('updateFake', [SettingController::class,'updateFake'])->middleware(['checkLogin'])->name('updateFake');
Route::post('fb', [SettingController::class,'updateFb'])->middleware(['checkLogin'])->name('fb');
Route::post('misc', [SettingController::class,'updateMisc'])->middleware(['checkLogin'])->name('misc');
Route::post('social', [SettingController::class,'updateSocial'])->middleware(['checkLogin'])->name('social');
Route::post('updateGender', [SettingController::class,'updateGender'])->middleware(['checkLogin'])->name('updateGender');



/*|--------------------------------------------------------------------------|
  | Report  Route                                                           |
  |--------------------------------------------------------------------------|*/

  Route::view('report', 'report')->name('report')->middleware(['checkLogin']);
  Route::post('fetchAllReport', [ReportController::class,'fetchAllReport'])->middleware(['checkLogin'])->name('fetchAllReport');