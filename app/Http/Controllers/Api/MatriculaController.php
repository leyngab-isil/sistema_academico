<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matriculas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Matriculas::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_matricula' => ['required', Rule::date()->afterOrEqual(today()->addDays(7))],
        ]);

        $matricula = Matriculas::create($request->all());

        return response()->json([
            'message' => 'Matricula registrado correctamente',
            'data' => $matricula
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matricula = Matriculas::find($id);

        if (!$matricula) {
            return response()->json([
                'message' => 'Matricula no encontrado'
            ], 404);
        }

        return response()->json($matricula);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $matricula = Matriculas::find($id);

        if (!$matricula) {
            return response()->json([
                'message' => 'Matricula no encontrado'
            ], 404);
        }

        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_matricula' => ['required', Rule::date()->afterOrEqual(today()->addDays(7))],
        ]);

        $matricula->update($request->all());

        return response()->json([
            'message' => 'Matricula actualizado correctamente',
            'data' => $matricula
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matricula = Matriculas::find($id);

        if (!$matricula) {
            return response()->json([
                'message' => 'Matricula no encontrado'
            ], 404);
        }

        $matricula->delete();

        return response()->json([
            'message' => 'Matricula eliminado correctamente'
        ]);
    }
}
