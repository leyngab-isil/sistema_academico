<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profesores;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->json(
            Profesores::all(),
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
            'especialidad' => 'nullable|max:100',
            'correo' => 'nullable|max:100|email|unique:profesores,correo',
            'telefono' => 'nullable|max:20',
        ]);

        $profesor = Profesores::create($request->all());

        return response()->json([
            'message' => 'Profesor registrado correctamente',
            'data' => $profesor
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $profesor = Profesores::find($id);

        if (!$profesor) {
            return response()->json([
                'message' => 'Profesor no encontrado'
            ], 404);
        }

        return response()->json($profesor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $profesor = Profesores::find($id);

        if (!$profesor) {
            return response()->json([
                'message' => 'Profesor no encontrado'
            ], 404);
        }

        $request->validate([
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'especialidad' => 'nullable|max:100',
            'correo' => 'nullable|max:100|email|unique:profesores,correo,' . $id,
            'telefono' => 'nullable|max:20',
        ]);

        $profesor->update($request->all());

        return response()->json([
            'message' => 'Profesor actualizado correctamente',
            'data' => $profesor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesor = Profesores::find($id);

        if (!$profesor) {
            return response()->json([
                'message' => 'Profesor no encontrado'
            ], 404);
        }

        $profesor->delete();

        return response()->json([
            'message' => 'Profesor eliminado correctamente'
        ]);
    }
}
