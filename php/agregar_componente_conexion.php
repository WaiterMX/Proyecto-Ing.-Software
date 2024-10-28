<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new mysqli('localhost', 'root', '', 'baldi_tech');

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "INSERT INTO componentes (nombre, precio, cantidad) VALUES ('$nombre', '$precio', '$cantidad')";

    if ($conexion->query($sql) === TRUE) {
        echo "Componente agregado exitosamente";
    } else {
        echo "Error al agregar el componente: " . $conexion->error;
    }
    $conexion->close();
}
?>
