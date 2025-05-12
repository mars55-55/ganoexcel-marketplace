<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #333;
            font-family: 'Inter', sans-serif;
            color: #FFD700;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-container {
            background-color: #2A2A2A;
            border: 2px solid #CBAF77;
            border-radius: 20px;
            box-shadow: 3px 4px 0px 1px #E99F4C;
            padding: 30px 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .reset-container p {
            font-size: 0.95rem;
            color: #E8D78D;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #FFD700;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #264143;
            border-radius: 4px;
            font-size: 15px;
            box-shadow: 3px 4px 0px 1px #E99F4C;
            outline: none;
        }

        input[type="email"]:focus {
            transform: translateY(4px);
            box-shadow: 1px 2px 0px 0px #E99F4C;
        }

        .btn {
            padding: 12px;
            width: 100%;
            font-size: 15px;
            background: #DE5499;
            border-radius: 10px;
            font-weight: 800;
            color: #1e1e1e;
            box-shadow: 3px 3px 0px 0px #E99F4C;
            cursor: pointer;
        }

        .btn:hover {
            opacity: .9;
        }

        .status, .error {
            font-size: 0.85rem;
            margin-bottom: 1rem;
            color: #f8d99b;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <p>
            ¿Olvidaste tu contraseña? No hay problema. Indícanos tu correo electrónico y te enviaremos un enlace para que puedas establecer una nueva.
        </p>

        <!-- Estado de la sesión -->
        @if (session('status'))
            <div class="status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Dirección de correo -->
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <div>
                <button type="submit" class="btn">Enviar enlace de restablecimiento</button>
            </div>
        </form>
    </div>
</body>
</html>

