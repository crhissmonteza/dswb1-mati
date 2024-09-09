<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')
                         ->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::find($id);
        $role->update($request->all());

        return redirect()->route('roles.index')
                         ->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('roles.index')
                         ->with('success', 'Role deleted successfully.');
    }
}

