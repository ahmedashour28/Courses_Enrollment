<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TraningCoursesController;



Route::get('/', [HomeController::class,'index'])->name('home');

Route:: get('courses',[CoursesController::class,'index'])->name('courses.index');
Route:: get('create_courses',[CoursesController::class,'create'])->name('courses.create');
Route:: post('store_courses',[CoursesController::class,'store'])->name('courses.store');
Route:: get('edit_courses/{id}',[CoursesController::class,'edit'])->name('courses.edit');
Route:: PUT('update_courses/{id}',[CoursesController::class,'update'])->name('courses.update');
Route:: get('delete_courses/{id}',[CoursesController::class,'destroy'])->name('courses.destroy');


Route:: get('student',[StudentController::class,'index'])->name('student.index');
Route:: get('create_student',[StudentController::class,'create'])->name('student.create');
Route:: post('store_student',[StudentController::class,'store'])->name('student.store');
Route:: get('edit_student/{id}',[StudentController::class,'edit'])->name('student.edit');
Route:: PUT('update_student/{id}',[StudentController::class,'update'])->name('student.update');
Route:: get('delete_student/{id}',[StudentController::class,'destroy'])->name('student.destroy');
Route:: post('ajax_search_student',[StudentController::class,'ajax_search_student'])->name('student.ajax_search_student');



Route:: get('traningCourses',[TraningCoursesController::class,'index'])->name('traningCourses.index');
Route:: get('create_traningCourses',[TraningCoursesController::class,'create'])->name('traningCourses.create');
Route:: post('store_traningCourses',[TraningCoursesController::class,'store'])->name('traningCourses.store');
Route:: get('edit_traningCourses/{id}',[TraningCoursesController::class,'edit'])->name('traningCourses.edit');
Route:: PUT('update_traningCourses/{id}',[TraningCoursesController::class,'update'])->name('traningCourses.update');
Route:: get('delete_traningCourses/{id}',[TraningCoursesController::class,'destroy'])->name('traningCourses.destroy');
Route:: get('details_traningCourses/{id}',[TraningCoursesController::class,'details'])->name('traningCourses.details');
Route:: get('enrollStudent_traningCourses/{id}',[TraningCoursesController::class,'enrollStudent'])->name('traningCourses.enrollStudent');
Route:: post('AddEnrollStudent_traningCourses/{id}',[TraningCoursesController::class,'AddEnrollStudent'])->name('traningCourses.AddEnrollStudent');
Route:: get('deleteEnrollStudent_traningCourses/{id}',[TraningCoursesController::class,'deleteEnrollStudent'])->name('traningCourses.deleteEnrollStudent');




