<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\FeedController;
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

/*Route::get('/', function () {

    return view('welcome');
});*/

Route::get('/',[DashboardController::class,'index'])->name('dashboard');

/*Route::get('/ideas/{idea}',[IdeaController::class,'show'])->name('ideas.show');

Route::get('/ideas/{idea}/edit',[IdeaController::class,'edit'])->name('ideas.edit')->middleware('auth');

Route::put('/ideas/{idea}',[IdeaController::class,'update'])->name('ideas.update')->middleware('auth');

Route::post('/ideas',[IdeaController::class,'store'])->name('ideas.store');

Route::delete('/ideas/{idea}',[IdeaController::class,'destroy'])->name('ideas.destroy')->middleware('auth');

Route::post('/ideas/{idea}/comments',[CommentController::class,'store'])->name('ideas.comments.store')->middleware('auth');*/

Route::resource('ideas', IdeaController::class)->except(['index','create','show'])->middleware('auth');


Route::resource('ideas', IdeaController::class)->only(['show']);


Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');


Route::resource('users', UserController::class)->only(['show']);

Route::resource('users', UserController::class)->only(['edit','update'])->middleware('auth');

Route::get('profile',[UserController::class,'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('users/{idea}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name('ideas.like');

Route::post('users/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name('ideas.unlike');

Route::get('/feed',FeedController::class)->middleware('auth')->name('feed');

Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware('auth','can:admin');

Route::get('/terms', function () {

    return view('terms');
})->name('terms');
