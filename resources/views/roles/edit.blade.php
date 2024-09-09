@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar rol</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del rol:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
    </form>
</div>

<label for="role">Asignar Rol</label>
<select name="role_id">
    @foreach($roles as $role)
        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
            {{ $role->name }}
        </option>
    @endforeach
</select>
@endsection
