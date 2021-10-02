<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/page1',[\App\Http\Controllers\SiteController::class,'page1']);
Route::get('/page2',[\App\Http\Controllers\SiteController::class,'page2']);
Route::get('/page3',[\App\Http\Controllers\SiteController::class,'page3']);
Route::get('/page4',[\App\Http\Controllers\SiteController::class,'page4']);
Route::get('/page5',[\App\Http\Controllers\SiteController::class,'page5']);
Route::get('/admin/activity',[\App\Http\Controllers\AdminController::class,'activity'])
    ->name('admin.activity');
