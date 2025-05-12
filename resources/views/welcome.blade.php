<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GANOEXCEL</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #333; /* Fondo negro suave */
            font-family: 'Inter', sans-serif;
            color: #FFD700; /* Color dorado para el texto */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .landing-container {
            text-align: center;
            max-width: 600px;
            padding: 2rem;
            background-color: #2A2A2A; /* Fondo de la tarjeta negro no tan oscuro */
            border-radius: 1.5rem;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.15);
            border: 1px solid #CBAF77; /* Borde dorado suave */
        }

        .brand-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #CBAF77; /* Título dorado suave */
            letter-spacing: 1px;
        }

        .description {
            font-size: 1rem;
            line-height: 1.6;
            color: #E8D78D; /* Descripción dorado suave */
            margin-bottom: 2rem;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .button-group a {
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            background-color: #CBAF77; /* Fondo dorado */
            color: #1e1e1e; /* Texto en negro */
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .button-group a:hover {
            background-color: #E6C200; /* Efecto hover dorado más brillante */
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <h1 class="brand-title">GANOEXCEL</h1>
        <p class="description">
            Desde 1983, GANO EXCEL selecciona las 6 variedades más potentes de <strong>Ganoderma Lucidum</strong> entre más de 200,
            combinándolas mediante un proceso orgánico de cultivo de tejidos para crear un extracto único en el mundo con múltiples propiedades para la salud.
        </p>
        <div class="button-group">
            <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="btn">Registrarse</a>
        </div>
    </div>
</body>
</html>
