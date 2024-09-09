@extends('layouts.app')

@section('content')
<h1>Lista de Usuarios</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name ?? 'Sin rol asignado' }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
