<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Taskcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// route::post('tasks',[Taskcontroller::class, 'store']);
// route::get('tasks',[Taskcontroller::class, 'index']);
// route::get('tasks/{id}',[Taskcontroller::class, 'show']);
//route::put('tasks/{id}',[Taskcontroller::class, 'update']);
// route::delete('tasks/{id}',[Taskcontroller::class, 'destroy']);
Route::apiResource('users', UserController::class);
Route::put('update-users/{id}',[UserController::class, 'update']);
Route::apiResource('tasks', Taskcontroller::class);
Route::apiResource('profiles', ProfileController::class);