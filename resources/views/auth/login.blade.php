<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Inicio de Sesión</title>
</head>
<body>
    <div class="form-container">
        <h1>Inicio de Sesión</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>Si no tiene una cuenta, entonces <a href="{{ route('register.form') }}">haga clic aquí</a> para registrarse.</p>
    </div>
</body>
</html>


