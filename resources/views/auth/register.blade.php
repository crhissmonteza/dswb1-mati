<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Registro de Usuario</title>
</head>
<body>
    <div class="form-container">
        <h1>Registro de Usuario</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit">Registrar</button>
        </form>
        <p>Si ya tiene una cuenta, <a href="{{ route('login.form') }}">haga clic aquí</a> para iniciar sesión.</p>
    </div>
</body>
</html>



