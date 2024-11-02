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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');


Route::middleware('auth')->group(function(){


    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin');
 /*    Route::get('/admin/post/', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/admin/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');

    Route::post('/admin/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::delete('/admin/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/admin/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update'); */
/* 
    Route::put('/admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

    
    Route::delete('/admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy'); */


});

/* Route::middleware('role:admin')->group(function(){


    Route::get('/admin/users/', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

});



Route::middleware('can:view,user')->group(function(){

    Route::get('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');


}); */

?>