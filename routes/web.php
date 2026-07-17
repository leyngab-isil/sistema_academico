<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');

Route::get('/alumnos', function(){
    return view('alumnos.index');
});

Route::get('/profesores', function(){
    return view('profesores.index');
});

Route::get('/cursos', function(){
    return view('cursos.index');
});