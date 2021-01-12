<?php

use App\Http\Controllers\admin\mainController as AdminMainController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\postController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\shared\mainController;
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
Auth::routes(['reset' => false, 'verify' => false]);

Route::get('/', [mainController::class, 'index'])->name('home');
Route::post('/comment', [mainController::class, 'comment'])->name('comment');
Route::get('/home', [mainController::class, 'index'])->name('home');
Route::get('/about', [mainController::class, 'about'])->name('about');
Route::get('/privacy', [mainController::class, 'privacy'])->name('privacy');
Route::get('/contact', [mainController::class, 'contact'])->name('contact');
Route::get('/search', [mainController::class, 'search'])->name('search');
Route::get('/cat/{cat}', [mainController::class, 'category'])->name('category')->where(['cat'=>'[0-9]+']);
Route::get('/post/{post}', [mainController::class, 'post'])->name('post')->where(['post'=>'[0-9]+']);


Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {
    Route::get('/', [AdminMainController::class, 'dashBoard'])->name('dashBoard');

    Route::resource('/posts', postController::class)->except(['index', 'show']);
    Route::resource('/categories', CategoriesController::class)->except(['show']);
});
