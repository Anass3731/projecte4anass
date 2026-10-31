<?php

namespace App\Http\Controllers;

use App\Models\AlumneAnass;
use Illuminate\Http\Request;

class AlumneAnassController extends Controller
{
    // Mostrar todos los alumnos
    public function index()
    {
        return response()->json(AlumneAnass::all());
    }

    // Mostrar un alumno concreto
    public function show($id)
    {
        $alumne = AlumneAnass::find($id);

        if (!$alumne) {
            return response()->json([
                'mensaje' => 'Alumno no encontrado'
            ], 404);
        }

        return response()->json($alumne);
    }

    // Crear un alumno
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:alumne_anass,email',
            'edad' => 'required|integer|min:1',
        ]);

        $alumne = AlumneAnass::create($datos);

        return response()->json($alumne, 201);
    }

    // Actualizar un alumno
    public function update(Request $request, $id)
    {
        $alumne = AlumneAnass::find($id);

        if (!$alumne) {
            return response()->json([
                'mensaje' => 'Alumno no encontrado'
            ], 404);
        }

        $datos = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:alumne_anass,email,' . $id,
            'edad' => 'sometimes|required|integer|min:1',
        ]);

        $alumne->update($datos);

        return response()->json($alumne);
    }

    // Eliminar un alumno
    public function destroy($id)
    {
        $alumne = AlumneAnass::find($id);

        if (!$alumne) {
            return response()->json([
                'mensaje' => 'Alumno no encontrado'
            ], 404);
        }

        $alumne->delete();

        return response()->json([
            'mensaje' => 'Alumno eliminado correctamente'
        ]);
    }
}