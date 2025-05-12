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

        .reset-card {
            background-color: #2A2A2A;
            border: 2px solid #CBAF77;
            border-radius: 20px;
            box-shadow: 3px 4px 0px 1px #E99F4C;
            padding: 30px 40px;
            width: 100%;
            max-width: 400px;
        }

        .reset-card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #FFD700;
            font-size: 1.6rem;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #FFD700;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #264143;
            border-radius: 4px;
            font-size: 15px;
            box-shadow: 3px 4px 0px 1px #E99F4C;
            outline: none;
        }

        input:focus {
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
            margin-top: 1rem;
            cursor: pointer;
        }

        .btn:hover {
            opacity: .9;
        }

        .error {
            font-size: 0.85rem;
            color: #f8d99b;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="reset-card">
        <h2>Restablecer Contraseña</h2>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nueva contraseña -->
            <div class="form-group">
                <label for="password">Nueva contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmar contraseña -->
            <div class="form-group">
                <label for="password_confirmation">Confirmar contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Restablecer Contraseña</button>
        </form>
    </div>
</body>
</html>

