<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ComicBookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ChapterImageController;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Auth::routes(['verify' => false, 'register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
	Route::Resource('users', UserController::class);
	Route::get('profile', [ProfileController::class,'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class,'update'])->name('profile.update');
	Route::put('profile/password', [ProfileController::class,'password'])->name('profile.password');
	Route::Resource('comic_books', ComicBookController::class);
	Route::Resource('chapters', ChapterController::class);
	Route::Resource('chapter_images', ChapterImageController::class);
	
});