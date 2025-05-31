<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::get('/', [PostController::class, 'index'])->name('home');




//Rutas filtradas por middleware AUTH
Route::resource('categories', CategoryController::class)->middleware("auth");
Route::resource('posts', PostController::class)->except('index')->middleware("auth");

//Rutas publicas de posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

//Rutas de administrador
Route::get("/admin/posts",[PostController::class,"indexAdmin"])->name("admin.posts.index")->middleware("auth");
Route::get("/admin/categories",[CategoryController::class,"index"])->name("admin.categories.index")->middleware("auth");



//Autenticacion


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
