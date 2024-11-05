<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e0e7ff;
            position: relative;
            overflow: hidden;
        }

        /* Estilo para el fondo circular */
        .background-circle {
            position: absolute;
            top: -100px;
            left: -100px;
            width: 400px;
            height: 400px;
            background-color: #4f46e5;
            border-radius: 50%;
            z-index: 1;
        }

        .login-container {
            width: 100%;
            max-width: 350px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            z-index: 2;
            position: relative;
        }

        h2 {
            margin-bottom: 10px;
            color: #333;
            font-size: 24px;
            font-weight: 600;
        }

        .alternative {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .alternative a {
            color: #4f46e5;
            text-decoration: none;
        }

        .alternative a:hover {
            text-decoration: underline;
        }

        label {
            display: block;
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4f46e5;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3b3aeb;
        }
    </style>
</head>
<body>
    <div class="background-circle"></div>
    <div class="login-container">
        <h2>BaldiTech</h2>
        <form action="login_handler.php" method="POST">
            
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
