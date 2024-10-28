<?php

include 'editar_componente_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql_actualizar = "UPDATE componentes SET nombre = '$nombre', precio = $precio, cantidad = $cantidad WHERE id = $id";

    if ($conexion->query($sql_actualizar) === TRUE) {
        echo "Componente actualizado correctamente";
        
        header("Location: listar_componentes.php");
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
</head>
<body>

    <h1>Editar Componente</h1>

    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($componente['nombre']); ?>" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $componente['precio']; ?>" required><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo $componente['cantidad']; ?>" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="listar_componentes.php">Volver</a>

</body>
</html>

