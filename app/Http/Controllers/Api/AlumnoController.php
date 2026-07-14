<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumnos;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Alumnos::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'dni' => 'nullable|max:15|unique:alumnos,dni',
            'correo' => 'nullable|email|unique:alumnos,correo',
        ]);

        $alumno = Alumnos::create($request->all());

        return response()->json([
            'message' => 'Alumno registrado correctamente',
            'data' => $alumno,
            'status' => true
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Alumnos::find($id);

        if (!$alumno) {
            return response()->json([
                'message' => 'Alumno no encontrado'
            ], 404);
        }

        return response()->json($alumno);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alumno = Alumnos::find($id);

        if (!$alumno) {
            return response()->json([
                'message' => 'Alumno no encontrado'
            ], 404);
        }

        $request->validate([
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'dni' => 'nullable|max:15|unique:alumnos,dni,' . $id,
            'correo' => 'nullable|email|unique:alumnos,correo,' . $id,
        ]);

        $alumno->update($request->all());

        return response()->json([
            'message' => 'Alumno actualizado correctamente',
            'data' => $alumno
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumnos::find($id);

        if (!$alumno) {
            return response()->json([
                'message' => 'Alumno no encontrado'
            ], 404);
        }

        $alumno->delete();

        return response()->json([
            'message' => 'Alumno eliminado correctamente'
        ]);
    }
}
