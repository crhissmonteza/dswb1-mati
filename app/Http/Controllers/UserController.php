<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios con sus roles
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        // Encontrar el usuario por ID
        $user = User::find($id);

        // Obtener todos los roles para el dropdown
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Validar la entrada del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
        ]);

        // Encontrar el usuario y actualizar los datos
        $user = User::find($id);
        $user->update($request->all());

        // Asignar el rol seleccionado
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }
}
