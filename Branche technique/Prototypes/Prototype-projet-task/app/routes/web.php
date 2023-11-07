<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;



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




Route::get('/login', function () {
    return view('auth.connexion');
})->name('show.login');


Route::get('/inscription', function () {
    return view('auth.inscription');
})->name('show.inscription');

Route::get('/projet/task', function () {
    return view('Project.index');
});





Route::get('/', [ProjetController::class, 'getAll'])->name('show.home');
Route::post('/ajouter/projet', [ProjetController::class, 'create'])->name('create.projet');
Route::get('/ajouter/projet', [ProjetController::class, 'show'])->name('show.create_projet');
Route::post('/edit/projet/{id}', [ProjetController::class, 'edit'])->name('edit.projet');
Route::get('/edit/projet/{id}', [ProjetController::class, 'edit'])->name('edit.projet');
Route::PATCH('/edit/projet/{id}', [ProjetController::class, 'update'])->name('update.projet');
Route::post('/projet/delete/{id}', [ProjetController::class, 'delete'])->name('delete.projet');
Route::post('/projet/export', [ProjetController::class, 'export'])->name('projet.export');
Route::post('/projet/import', [ProjetController::class, 'import'])->name('projet.import');
Route::post('/projet/search', [ProjetController::class, 'search'])->name('projet.search');





Route::post('/inscription', [UserController::class, 'create'])->name('inscription.user');
Route::match(['get', 'post'], '/profile/{id}', [UserController::class, 'show'])->name('profile');
Route::PATCH('/profile/{id}/update', [UserController::class, 'update'])->name('update.user');


Route::post('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 




Route::get('/projet/{id}/task', [TaskController::class, 'show'])->name('show.task');
Route::post('/projet/task/ajouter/{id}', [TaskController::class, 'create'])->name('create.task');
Route::post('/projet/task/editer/{id}', [TaskController::class, 'edit'])->name('edit.task');
Route::get('/projet/task/editer/{id}', [TaskController::class, 'edit'])->name('edit.task');
Route::PATCH('/projet/task/editer/{id}', [TaskController::class, 'update'])->name('update.task');
Route::post('/projet/task/delete/{id}', [TaskController::class, 'delete'])->name('delete.task');
Route::post('/projet/task/search', [TaskController::class, 'search'])->name('task.search');
Route::post('/projet/{id}/task/import', [TaskController::class, 'import'])->name('task.import');
Route::post('/projet/task/export', [TaskController::class, 'export'])->name('task.export');



















