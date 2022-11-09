<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user() == null)    return view('login');
    else  return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::group(['prefix' => 'user'], function () {
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::group(['prefix' => 'project', 'middleware' => ['auth','admin']], function () {
    Route::get('/allProjects', [ProjectsController::class, 'index'])->name('allProjects');
    Route::get('/singleProject/{id}', [ProjectsController::class, 'show']);
    Route::get('/make',function () {return view('project.create');});
    Route::post('/create', [ProjectsController::class, 'create'])->name('project.create');
    Route::get('/edit/{id}/', [ProjectsController::class, 'edit']);
    Route::post('/update/{id}/', [ProjectsController::class, 'update'])->name('project.update');
    Route::delete('/delete/{id}', [ProjectsController::class, 'destroy'])->name('project.delete');
});

Route::group(['prefix' => 'task', 'middleware' => ['auth']], function () {
    Route::get('/singleTask/{id}', [TasksController::class, 'show']);
    Route::get('/myTasks', [TasksController::class, 'myTasks'])->name('myTasks');
    Route::get('/submit/{id}', [TasksController::class, 'submitTask']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/allTasks', [TasksController::class, 'index'])->name('allTasks');
        Route::get('/make', [TasksController::class, 'make']);
        Route::post('/create', [TasksController::class, 'create'])->name('task.create');
        Route::get('/edit/{id}/', [TasksController::class, 'edit']);
        Route::post('/update/{id}/', [TasksController::class, 'update'])->name('task.update');
        Route::delete('/delete/{id}', [TasksController::class, 'destroy'])->name('task.delete');
    });
});
