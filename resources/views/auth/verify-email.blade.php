<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1e1e1e;
            font-family: 'Inter', sans-serif;
            color: #FFD700;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .verify-container {
            background-color: #2a2a2a;
            border: 2px solid #CBAF77;
            box-shadow: 3px 4px 0px 1px #E99F4C;
            border-radius: 20px;
            padding: 2rem;
            max-width: 480px;
            width: 100%;
            text-align: center;
        }

        .message {
            font-size: 1rem;
            color: #f4e7b5;
            margin-bottom: 1.5rem;
        }

        .status {
            font-size: 0.9rem;
            font-weight: 600;
            color: #9fffab;
            margin-bottom: 1rem;
        }

        .button {
            background: #DE5499;
            border: none;
            color: #1e1e1e;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            box-shadow: 3px 3px 0px 0px #E99F4C;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .button:hover {
            opacity: 0.9;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .logout-button {
            background: transparent;
            border: none;
            text-decoration: underline;
            font-size: 0.9rem;
            color: #FFD700;
            cursor: pointer;
        }

        .logout-button:hover {
            color: #f8d99b;
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <p class="message">
            Gracias por registrarte. Antes de comenzar, por favor verifica tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar. <br> Si no recibiste el correo, con gusto te enviaremos otro.
        </p>

        @if (session('status') == 'verification-link-sent')
            <p class="status">
                Se ha enviado un nuevo enlace de verificación al correo que proporcionaste durante el registro.
            </p>
        @endif

        <div class="button-group">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="button">Reenviar correo de verificación</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">Cerrar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
