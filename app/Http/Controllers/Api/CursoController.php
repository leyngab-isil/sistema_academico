<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Cursos::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nombre_curso' => 'required|max:100',
            'descripcion' => 'required|nullable',
            'creditos' => 'required|min:1|max:6',
        ]);

        $curso = Cursos::create($request->all());

        return response()->json([
            'message' => 'Curso registrado correctamente',
            'data' => $curso
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Cursos::with(['horarios', 'matriculas'])->find($id);

        if (!$curso) {
            return response()->json([
                'message' => 'curso no encontrado'
            ], 404);
        }

        return response()->json([
            'data' => $curso,
            'cantidad_horarios' => $curso->horarios->count(),
            'cantidad_matriculas' => $curso->matriculas->count()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = Cursos::find($id);

        if (!$curso) {
            return response()->json([
                'message' => 'curso no encontrado'
            ], 404);
        }

        $request->validate([
            'nombre_curso' => 'required|max:100',
            'descripcion' => 'required|nullable',
            'creditos' => 'required|min:1|max:6',
        ]);

        $curso->update($request->all());

        return response()->json([
            'message' => 'Curso actualizado correctamente',
            'data' => $curso
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Cursos::find($id);

        $horarios = $curso->horarios()->count();
        $matriculas = $curso->matriculas()->count();

        if (!$curso) {
            return response()->json([
                'message' => 'Curso no encontrado'
            ], 404);
        }

         if ($horarios > 0 || $matriculas > 0) {
            return response()->json([
                'message' => "El curso tiene {$horarios} horarios asociados y {$matriculas} matriculas.",
                'requires_confirmation' => true
            ], 409);
        }

        $curso->delete();

        return response()->json([
            'message' => 'Curso eliminado correctamente'
        ]);
    }
}
