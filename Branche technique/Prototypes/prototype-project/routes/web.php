<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\TaskController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::group(['middleware' => ['auth']], function(){
    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/projects/{id}/show', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projects/{id}/update', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::post('/projects/import', [ProjectController::class, 'import'])->name('project.import');
    Route::post('/projects/export', [ProjectController::class, 'export'])->name('project.export');


    Route::get('/project/tasks', [TaskController::class, 'index'])->name('task.show');
    Route::get('/projects/{id}/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/projects/{id}/tasks/show', [TaskController::class, 'show'])->name('task.show');
    Route::get('/projects/{id}/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/projects/{id}/tasks/store', [TaskController::class, 'store'])->name('task.store');
    Route::get('/projects/{id}/tasks/{task_id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/projects/{id}/tasks/{task_id}/update', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/projects/{id}/tasks/{task_id}/delete', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::post('/projects/{id}/tasks/import', [TaskController::class, 'import'])->name('task.import');
    Route::post('/projects/{id}/tasks/export', [TaskController::class, 'export'])->name('task.export');
});