<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('home.pages.index', ["title" => "Home", 'active' => 'home',]);
});

Route::get('/blog', [PostController::class, 'index']);

Route::get('blog/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', [PostController::class, 'categories']);
Route::get('/categories/{category:slug}', [PostController::class, 'category']);
Route::get('/authors/{author:username}', [PostController::class, 'author']);


// login route
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'loginstore']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerstore']);

Route::get('/admin', function () {
    $data = [
        "title" => "Dashboard"
    ];
    return view('admin.pages.index', $data);
});

Route::resource('/admin/post', AdminController::class);
Route::resource('/admin/category', CategoryController::class);
