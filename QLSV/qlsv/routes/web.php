<?php

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



Route::get('/lang{locale}', function ($locale) {
    session(['lang'=> $locale]);
    // App::setlocale($locale);
    return view('welcome');
});

$lang=session('lang');
App::setlocale($lang);

Route::resource('class', \App\Http\Controllers\ClassController::class);
Route::resource('student', \App\Http\Controllers\StudentController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
