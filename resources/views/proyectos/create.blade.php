<!DOCTYPE html>
<html>
<head>
    <title>Crear Proyecto</title>
</head>
<body>
    <form action="/proyectos" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="date" name="fecha_inicio" placeholder="Fecha de Inicio">
        <input type="text" name="estado" placeholder="Estado">
        <input type="text" name="responsable" placeholder="Responsable">
        <input type="number" step="0.01" name="monto" placeholder="Monto">
        <button type="submit">Crear Proyecto</button>
    </form>
</body>
</html>