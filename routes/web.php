<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ScoresController;

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
Route::get('/home', [PostController::class, 'home'])
    ->name('home');

Route::get('/index/{level}', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/show/{post}', [PostController::class, 'show'])
    ->name('posts.show')
    ->where('post', '[0-9]+');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('/posts/store', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('posts.edit')
    ->where('post', '[0-9]+');

Route::patch('/posts/{post}/update', [PostController::class, 'update'])
    ->name('posts.update')
    ->where('post', '[0-9]+');

Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->where('post', '[0-9]+');

Route::post('/posts/{post}/scores', [ScoresController::class, 'store'])
    ->name('scores.store')
    ->where('post', '[0-9]+');

Route::delete('/scores/{scores}/destroy', [ScoresController::class, 'destroy'])
    ->name('scores.destroy')
    ->where('post', '[0-9]+');

Route::get('/search', [PostController::class, 'search'])
    ->name('search');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
