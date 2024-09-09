<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;  

class MantenedorController extends Controller
{
    // Método para listar todos los roles
    public function index()
    {
        $roles = Role::all();  // Traemos todos los roles
        return view('roles.index', compact('roles'));  // Pasamos los roles a la vista
    }

    // Método para mostrar el formulario de creación de un nuevo rol
    public function create()
    {
        return view('roles.create');
    }

    // Método para almacenar un nuevo rol
    public function store(Request $request)
    {
        // Validamos los datos del formulario
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        // Creamos el nuevo rol
        $role = new Role;
        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    // Método para mostrar el formulario de edición de un rol
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    // Método para actualizar un rol existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id.'|max:255',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    // Método para eliminar un rol
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
}

