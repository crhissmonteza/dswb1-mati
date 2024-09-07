<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
</head>
<body>
    <h1>Lista de Proyectos</h1>

    <ul>
        @foreach ($proyectos as $proyecto)
            <li>{{ $proyecto->nombre }} - {{ $proyecto->estado }}</li>
        @endforeach
    </ul>

</body>
</html>
