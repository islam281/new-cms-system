<?php




use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function(){


   
    Route::get('/post/', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');

    Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::delete('/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

  


});





?>