<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SchoolController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentUsercontroller;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Routing\RouteGroup;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'prefix'     => 'admin', 'middleware' => [  'auth' ]], function () {

    Route::resource('user', UserController::class);
    Route::resource('student', StudentController::class);

    Route::get('newstudent',
     [App\Http\Controllers\Admin\StudentUsercontroller::class, 'newstu'])->name('newstudent');

     Route::post('regnewstudent',
     [App\Http\Controllers\Admin\StudentUsercontroller::class, 'store'])->name('regnewstudent');

  Route::resource('user', UserController::class);
  Route::resource('student', StudentController::class);

  Route::resource('schools', SchoolController::class);
  Route::resource('programs', ProgramController::class);
  Route::resource('courses', CourseController::class);
});

