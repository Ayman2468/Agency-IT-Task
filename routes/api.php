<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'user'], function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/logout', [UserController::class, 'logout']);
    });
});

Route::group(['prefix' => 'project', 'middleware' => ['auth:sanctum','admin']], function () {
    Route::get('/allProjects', [ProjectsController::class, 'index']);
    Route::get('/singleProject/{id}', [ProjectsController::class, 'show']);
    Route::post('/create', [ProjectsController::class, 'create']);
    Route::post('/update/{id}/', [ProjectsController::class, 'update']);
    Route::delete('/delete/{id}', [ProjectsController::class, 'destroy']);
});

Route::group(['prefix' => 'task', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/singleTask/{id}', [TasksController::class, 'show']);
    Route::get('/myTasks', [TasksController::class, 'myTasks']);
    Route::get('/submit/{id}', [TasksController::class, 'submitTask']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/allTasks', [TasksController::class, 'index']);
        Route::post('/create', [TasksController::class, 'create']);
        Route::post('/update/{id}/', [TasksController::class, 'update']);
        Route::delete('/delete/{id}', [TasksController::class, 'destroy']);
    });
});
