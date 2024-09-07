<!DOCTYPE html>
<html>
<head>
    <title>Editar Proyecto</title>
</head>
<body>
    <form action="/proyectos/{{ $proyecto->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $proyecto->nombre }}" placeholder="Nombre">
        <input type="date" name="fecha_inicio" value="{{ $proyecto->fecha_inicio }}" placeholder="Fecha de Inicio">
        <input type="text" name="estado" value="{{ $proyecto->estado }}" placeholder="Estado">
        <input type="text" name="responsable" value="{{ $proyecto->responsable }}" placeholder="Responsable">
        <input type="number" step="0.01" name="monto" value="{{ $proyecto->monto }}" placeholder="Monto">
        <button type="submit">Actualizar Proyecto</button>
    </form>
</body>
</html>