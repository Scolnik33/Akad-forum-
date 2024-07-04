<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Page

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/servises', [PageController::class, 'servises'])->name('servises');

Route::middleware('admin')->get('/admin', [PageController::class, 'admin'])->name('admin');

Route::get('/single/{id}', [PageController::class, 'single'])->name('single');

Route::get('/posts/{id}', [PageController::class, 'posts'])->name('posts');

Route::get('/tag/{tag}', [PageController::class, 'tag'])->name('tag');

Route::get('/category/{category}', [PageController::class, 'category'])->name('category');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [PageController::class, 'profile'])->name('profile');

    Route::get('/profile/update/{id}', [PageController::class, 'profileupdate'])->name('updateprofile');
    
    Route::get('/topost', [PageController::class, 'topost'])->name('topost');
    
    Route::get('/toupdate/{id}', [PageController::class, 'toupdate'])->name('toupdate');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [PageController::class, 'login'])->name('login');

    Route::get('/register', [PageController::class, 'register'])->name('register');
});

// User

Route::post('/signUp', [UserController::class, 'signUp'])->name('signUp');
 
Route::post('/signIn', [UserController::class, 'signIn'])->name('signIn');

Route::middleware('auth')->group(function () {
    Route::patch('/toupdateprofile/{id}', [UserController::class, 'toupdateprofile'])->name('toupdateprofile');
    
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

// Post

Route::post('/topost', [PostController::class, 'topost'])->name('createpost');

Route::patch('/toupdate/{id}', [PostController::class, 'toupdate'])->name('updatepost');

Route::delete('/todelete/{id}', [PostController::class, 'todelete'])->name('todelete');

// Comment

Route::post('/tocomment', [CommentController::class, 'tocomment'])->name('tocomment');

Route::patch('/toupdatecomment/{id}', [CommentController::class, 'toupdatecomment'])->name('toupdatecomment');

Route::delete('/todeletecomment/{id}', [CommentController::class, 'todeletecomment'])->name('todeletecomment');