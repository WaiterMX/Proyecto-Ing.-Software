<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Componente</title>
    <link rel="stylesheet" href="forms.css">
</head>
<body>
    <div class="background-circle"></div>

    <div class="form-container">
        <h2>Agregar Nuevo Componente</h2>
        <form action="agregar_componente_conexion.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required>

            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" required>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>

            <button type="submit">Agregar Componente</button>
        </form>
        
        <!-- Botón para ir a home.php -->
        <a href="/baldi_tech/home.php" style="text-decoration: none;">
            <button type="button" style="margin-top: 10px;">Ir a Home</button>
        </a>
    </div>
</body>
</html>
