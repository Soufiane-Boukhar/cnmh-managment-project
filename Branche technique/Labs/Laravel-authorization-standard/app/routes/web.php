<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;


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
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::get('/manage/permissions-roles/{id}', [RolePermissionController::class, 'showRolePermission'])->name('manage.role.permission');
    Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
    Route::post('/assign-role-permission', [RolePermissionController::class, 'assignRolePermission'])->name('assign.role.permission');
});





