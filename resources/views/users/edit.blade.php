@extends('layouts.app')

@section('content')
<h1>Editar Usuario</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
    </div>

    <div>
        <label for="role">Rol</label>
        <select name="role_id">
            @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Actualizar</button>
</form>
@endsection
