<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Http\Response; // Importar la clase Response

class ProyectoController extends Controller
{
    // ==========================
    // GET: Obtener todos los proyectos
    // ==========================
    public function index(Request $request)
    {
        $proyectos = Proyecto::all();  // Obtén todos los proyectos

        // Si la solicitud espera una respuesta JSON (API)
        if ($request->wantsJson()) {
            return response()->json($proyectos, 200);  // Devuelve los proyectos en JSON
        }

        // Si es una solicitud normal desde el navegador (HTML)
        return view('proyectos.index', compact('proyectos'));  // Devuelve la vista HTML
    }

    // ==========================
    // GET: Mostrar formulario de creación de proyecto (para la interfaz web)
    // ==========================
    public function create()
    {
        return view('proyectos.create'); // Devuelve la vista para crear un nuevo proyecto
    }

    // ==========================
    // POST: Guardar un nuevo proyecto en la base de datos
    // ==========================
    public function store(Request $request)
    {
        // Validación de los datos ingresados
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);
        
        // Crear el nuevo proyecto
        Proyecto::create($validated);

        // Respuesta con éxito y código 201
        return response()->json(['message' => 'Proyecto creado exitosamente'], 201);
    }

    // ==========================
    // GET: Mostrar un proyecto específico por ID
    // ==========================
    public function show($id)
    {
        // Buscar el proyecto por ID
        $proyecto = Proyecto::find($id);

        // Si no se encuentra el proyecto, devolver un error 404
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }

        // Devolver el proyecto encontrado con un código 200
        return response()->json($proyecto, 200);
    }

    // ==========================
    // GET: Mostrar formulario de edición de proyecto (para la interfaz web)
    // ==========================
    public function edit($id)
    {
        // Buscar el proyecto por ID
        $proyecto = Proyecto::find($id);

        // Si no se encuentra el proyecto, devolver un error 404
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }

        // Devolver la vista para editar el proyecto
        return view('proyectos.edit', compact('proyecto'));
    }

    // ==========================
    // PUT/PATCH: Actualizar un proyecto existente (UPDATE)
    // ==========================
    public function update(Request $request, $id)
    {
        // Buscar el proyecto por ID
        $proyecto = Proyecto::find($id);

        // Si no se encuentra el proyecto, devolver un error 404
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }

        // Validar los campos de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);

        // Actualizar los datos del proyecto
        $proyecto->update($validated);

        // Devolver respuesta con éxito y el proyecto actualizado
        return response()->json(['message' => 'Proyecto actualizado exitosamente', 'proyecto' => $proyecto], 200);
    }

    // ==========================
    // DELETE: Eliminar un proyecto específico
    // ==========================
    public function destroy($id)
    {
        // Buscar el proyecto por ID
        $proyecto = Proyecto::find($id);

        // Si no se encuentra el proyecto, devolver un error 404
        if (!$proyecto) {
            return response()->json(['message' => 'Proyecto no encontrado'], 404);
        }

        // Eliminar el proyecto
        $proyecto->delete();

        // Respuesta vacía con código 204 (No Content)
        return response()->json(null, 204);
    }
}

