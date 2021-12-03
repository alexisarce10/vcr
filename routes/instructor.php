<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
// use App\Http\Livewire\InstructorCourses; //ESTO SE ELIMINAR, REOOGANIZANDO RUTAS

Route::redirect('', 'instructor/courses');

// SE ELIMNAR REOORGANIZANDO RUTAS
// Route::get('courses', InstructorCourses::class)->middleware('can:Leer cursos')->name('courses.index');

// GENERANDO NUEVA RUTAS ORGANIZADAS

Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')->name('courses.curriculum');

Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')->name('courses.students');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');

