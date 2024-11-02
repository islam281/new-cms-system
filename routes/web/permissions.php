<?php 
use Illuminate\Support\Facades\Route;


Route::get('/permissions',[App\Http\Controllers\PermissionController::class,'index'])->name('permission.index');

Route::post('/permissions/store',[App\Http\Controllers\PermissionController::class,'store'])->name('permission.store');

Route::post('/permissions/{permission}/destroy',[App\Http\Controllers\PermissionController::class,'destroy'])->name('permission.destroy');

Route::get('/permissions/{permission}/show',[App\Http\Controllers\PermissionController::class,'show'])->name('permission.show');

Route::patch('/permissions/{permission}/update',[App\Http\Controllers\PermissionController::class,'update'])->name('permission.update');




?>