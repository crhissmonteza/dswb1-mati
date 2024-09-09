@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Roles</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Crear nuevo rol</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
