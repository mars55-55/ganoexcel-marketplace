<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
    <style>
        /* From Uiverse.io by mi-series */ 
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif; /* Fuente como la del código inicial */
            background-color: #333; /* Fondo negro más suave */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .form_area {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #2A2A2A; /* Fondo de la tarjeta negro no tan oscuro */
            height: auto;
            width: 100%;
            max-width: 400px; /* Limita el ancho máximo de la tarjeta */
            border: 2px solid #CBAF77; /* Borde dorado suave */
            border-radius: 20px;
            box-shadow: 3px 4px 0px 1px #CBAF77; /* Sombra dorada */
            padding: 20px;
        }

        .title {
            color: #CBAF77; /* Título dorado suave */
            font-weight: 900;
            font-size: 1.5em;
            margin-top: 20px;
        }

        .sub_title {
            font-weight: 600;
            margin: 5px 0;
            color: #E8D78D; /* Subtítulos dorados suaves */
        }

        .form_group {
            display: flex;
            flex-direction: column;
            align-items: baseline;
            margin: 10px;
        }

        .form_style {
            outline: none;
            border: 2px solid #CBAF77; /* Borde dorado suave */
            box-shadow: 3px 4px 0px 1px #CBAF77; /* Sombra dorada */
            width: 290px;
            padding: 12px 10px;
            border-radius: 4px;
            font-size: 15px;
            background-color: #444; /* Fondo oscuro para los campos de entrada */
            color: #E8D78D; /* Color dorado para texto */
        }

        .form_style:focus, .btn:focus {
            transform: translateY(4px);
            box-shadow: 1px 2px 0px 0px #CBAF77; /* Sombra dorada suave */
        }

        .btn {
            padding: 15px;
            margin: 25px 0px;
            width: 290px;
            font-size: 15px;
            background: #CBAF77; /* Fondo dorado */
            border-radius: 10px;
            font-weight: 800;
            box-shadow: 3px 3px 0px 0px #E99F4C;
        }

        .btn:hover {
            opacity: .9;
        }

        .link {
            font-weight: 800;
            color: #CBAF77; /* Enlace dorado suave */
            padding: 5px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .remember-me input {
            margin-right: 10px;
        }

        .no-account {
            color: #CBAF77; /* "No tienes cuenta" en dorado */
            font-weight: 800;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Formulario de Inicio de Sesión -->
        <div class="form_area">
            <p class="title">INICIAR SESIÓN</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form_group">
                    <label class="sub_title" for="email">Email</label>
                    <input id="email" class="form_style" type="email" name="email" required autofocus autocomplete="username">
                </div>

                <!-- Password -->
                <div class="form_group">
                    <label class="sub_title" for="password">Password</label>
                    <input id="password" class="form_style" type="password" name="password" required autocomplete="current-password">
                </div>

                <!-- Remember Me -->
                <div class="remember-me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me" class="sub_title">Recordarme</label>
                </div>

                <!-- Botones -->
                <div>
                    <button type="submit" class="btn">Iniciar Sesión</button>
                    <p class="no-account">¿No tienes cuenta? <a class="link" href="{{ route('register') }}">Regístrate aquí</a></p>
                    
                    <!-- Botón Olvidar Contraseña -->
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>
