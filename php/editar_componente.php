<?php

include 'editar_componente_conexion.php';

// Obtener el ID del componente que se va a editar
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID no válido.";
    exit;
}

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'baldi_tech');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los detalles del componente desde la base de datos
$sql = "SELECT * FROM componentes WHERE id = $id";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $componente = $resultado->fetch_assoc();
} else {
    echo "Componente no encontrado";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Sanitización de los datos para evitar inyecciones SQL
    $nombre = $conexion->real_escape_string($nombre);
    $precio = (float) $precio;
    $cantidad = (int) $cantidad;

    // Actualizar los datos en la base de datos
    $sql_actualizar = "UPDATE componentes SET nombre = '$nombre', precio = $precio, cantidad = $cantidad WHERE id = $id";

    if ($conexion->query($sql_actualizar) === TRUE) {
        echo "Componente actualizado correctamente";
        header("Location: listar_componentes.php"); // Redirigir al listado
        exit;
    } else {
        echo "Error al actualizar el componente: " . $conexion->error;
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Componente</title>
    <link rel="stylesheet" href="forms.css"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>

    <div class="background-circle"></div> <!-- Círculo de fondo -->

    <div class="form-container"> <!-- Contenedor del formulario -->
        <h2>Editar Componente</h2> <!-- Título del formulario -->

        <!-- Formulario de edición -->
        <form action="" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($componente['nombre']); ?>" required>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" value="<?php echo $componente['precio']; ?>" required>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo $componente['cantidad']; ?>" required>

            <button type="submit">Guardar</button>
        </form>

        <!-- Enlace para volver -->
        <a href="/baldi_tech/home.php" style="display: block; margin-top: 15px; color: #3a57e8;">Volver</a> 
    </div>

</body>
</html>
