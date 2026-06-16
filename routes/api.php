<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\ProfesorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', function () {
    return response()->json([
        'status' => true,
        'message' => 'API funcionando'
    ]);
});


Route::apiResource('alumnos', AlumnoController::class);
Route::get('/alumnos', [AlumnoController::class, 'index']);
Route::get('/alumnos/{id}', [AlumnoController::class, 'show']);
Route::post('/alumnos', [AlumnoController::class, 'store']);
Route::put('/alumnos/{id}', [AlumnoController::class, 'update']);
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy']);


Route::apiResource('cursos', CursoController::class);
Route::get('/cursos', [CursoController::class, 'index']);
Route::get('/cursos/{id}', [CursoController::class, 'show']);
Route::post('/cursos', [CursoController::class, 'store']);
Route::put('/cursos/{id}', [CursoController::class, 'update']);
Route::delete('/cursos/{id}', [CursoController::class, 'destroy']);


Route::apiResource('horarios', HorarioController::class);
Route::get('/horarios', [HorarioController::class, 'index']);
Route::get('/horarios/{id}', [HorarioController::class, 'show']);
Route::post('/horarios', [HorarioController::class, 'store']);
Route::put('/horarios/{id}', [HorarioController::class, 'update']);
Route::delete('/horarios/{id}', [HorarioController::class, 'destroy']);


Route::apiResource('matriculas', MatriculaController::class);
Route::get('/matriculas', [MatriculaController::class, 'index']);
Route::get('/matriculas/{id}', [MatriculaController::class, 'show']);
Route::post('/matriculas', [MatriculaController::class, 'store']);
Route::put('/matriculas/{id}', [MatriculaController::class, 'update']);
Route::delete('/matriculas/{id}', [MatriculaController::class, 'destroy']);


Route::apiResource('profesores', ProfesorController::class);
Route::get('profesores', [ProfesorController::class, 'index']);
Route::get('/profesores/{id}', [ProfesorController::class, 'show']);
Route::post('/profesores', [ProfesorController::class, 'store']);
Route::put('/profesores/{id}', [ProfesorController::class, 'update']);
Route::delete('/profesores/{id}', [ProfesorController::class, 'destroy']);