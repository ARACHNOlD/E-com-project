<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\SiteController::class, 'getHome']);
Route::get('/about', [App\Http\Controllers\SiteController::class, 'getAbout']);
Route::get('/service', [App\Http\Controllers\SiteController::class, 'getService']);
Route::get('/gallery', [App\Http\Controllers\SiteController::class, 'getGallery']);
Route::get('/contact', [App\Http\Controllers\SiteController::class, 'getContact']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//category
Route::get('add/category',[App\Http\Controllers\HomeController::class, 'getAddCategory'])->name('getAddCategory');
Route::post('add/category',[App\Http\Controllers\HomeController::class, 'postAddCategory'])->name('postAddCategory');
Route::get('manage/category',[App\Http\Controllers\HomeController::class, 'getManageCategory'])->name('getManageCategory');

Route::get('product/add',[App\Http\Controllers\HomeController::class, 'getAddProduct'])->name('getAddProduct');
Route::post('product/add',[App\Http\Controllers\HomeController::class, 'postAddProduct'])->name('postAddProduct');