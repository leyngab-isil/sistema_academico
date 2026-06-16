<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Horarios;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Horarios::with('curso')->get(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'dia_semana' => 'required|max:20',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'aula' => 'nullable|max:50',
        ]);

        $horario = Horarios::create($request->all());

        return response()->json([
            'message' => 'Horario registrado correctamente',
            'data' => $horario
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $horario = Horarios::with('curso')->find($id);

        if (!$horario) {
            return response()->json([
                'message' => 'Horario no encontrado'
            ], 404);
        }

        return response()->json($horario, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $horario = Horarios::find($id);

        if (!$horario) {
            return response()->json([
                'message' => 'Horario no encontrado'
            ], 404);
        }

        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'dia_semana' => 'required|max:20',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'aula' => 'nullable|max:50',
        ]);

        $horario->update($request->all());

        return response()->json([
            'message' => 'Horario actualizado correctamente',
            'data' => $horario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $horario = Horarios::find($id);

        if (!$horario) {
            return response()->json([
                'message' => 'Horario no encontrado'
            ], 404);
        }

        $horario->delete();

        return response()->json([
            'message' => 'Horario eliminado correctamente'
        ], 200);
    }
}
