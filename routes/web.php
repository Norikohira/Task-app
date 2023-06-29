<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'create'])->name('task.create');


Route::post('/task/save',[TaskController::class,'store'])->name('task.store');


Route::get('/task/delete/{id}', [TaskController::class, 'edit'])->name('task.edit');

Route::patch('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');

Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
