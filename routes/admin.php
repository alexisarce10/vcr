<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;

Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

//SE USA ONLY, PARA ELIMINAR LOS METODOS NO USADOS EN USER-CONTROLLER
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

// RUTA PARA ADMINISTRAR AREAS
Route::resource('areas', AreaController::class)->names('areas');

// Ruta para CRUD Levels
Route::resource('levels', LevelController::class)->names('levels');

// Ruta para CRUD prices
Route::resource('prices', PriceController::class)->names('prices');

//Cursos en estado revisión
Route::get('courses',[CourseController::class, 'index'])->name('courses.index');

Route::get('courses/{course}',[CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');
