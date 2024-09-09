@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear nuevo rol</h1>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del rol:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
