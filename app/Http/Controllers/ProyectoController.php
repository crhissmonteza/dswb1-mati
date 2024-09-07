<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Http\Response; // Importar la clase Response

class ProyectoController extends Controller
{
    // Mostrar una lista de todos los proyectos
    public function index()
    {
        $proyectos = Proyecto::all();
        // Retorna todos los proyectos con código de estado 200
        return response()->json($proyectos, Response::HTTP_OK);
    }

    // Guardar un nuevo proyecto en la base de datos
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
            'estado' => 'required',
            'responsable' => 'required',
            'monto' => 'required|numeric',
        ]);

        // Crear el nuevo proyecto
        $proyecto = Proyecto::create($request->all());

        // Retorna el proyecto creado con código de estado 201
        return response()->json($proyecto, Response::HTTP_CREATED);
    }

    // Mostrar un proyecto específico por ID
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            // Retorna un mensaje de error con código de estado 404 si no se encuentra el proyecto
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Retorna el proyecto con código de estado 200
        return response()->json($proyecto, Response::HTTP_OK);
    }

    // Actualizar un proyecto existente en la base de datos
    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
            'estado' => 'required',
            'responsable' => 'required',
            'monto' => 'required|numeric',
        ]);

        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            // Retorna un mensaje de error con código de estado 404 si no se encuentra el proyecto
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Actualiza el proyecto
        $proyecto->update($request->all());

        // Retorna el proyecto actualizado con código de estado 200
        return response()->json($proyecto, Response::HTTP_OK);
    }

    // Eliminar un proyecto específico de la base de datos
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            // Retorna un mensaje de error con código de estado 404 si no se encuentra el proyecto
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Elimina el proyecto
        $proyecto->delete();

        // Retorna una respuesta vacía con código de estado 204
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}