<?php 
use Illuminate\Support\Facades\Route;



Route::get('/roles',[App\Http\Controllers\RoleController::class,'index'])->name('role.index');

Route::post('/roles/store',[App\Http\Controllers\RoleController::class,'store'])->name('role.store');

Route::delete('/roles/{role}/delete',[App\Http\Controllers\RoleController::class,'destroy'])->name('role.destroy');


Route::get('/roles/{role}/show',[App\Http\Controllers\RoleController::class,'show'])->name('role.show');

Route::PATCH('/roles/{role}/update',[App\Http\Controllers\RoleController::class,'update'])->name('role.update');
Route::put('/roles/{role}/attach',[App\Http\Controllers\RoleController::class,'attach'])->name('permissions.roles.attach');
Route::put('/roles/{role}/detach',[App\Http\Controllers\RoleController::class,'detach'])->name('permissions.roles.detach');

?>