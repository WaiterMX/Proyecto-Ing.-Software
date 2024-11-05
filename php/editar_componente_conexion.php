<?php
$conexion = new mysqli('localhost', 'root', '', 'baldi_tech');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$id = $_GET['id'];

$sql = "SELECT * FROM componentes WHERE id = $id";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $componente = $resultado->fetch_assoc();
} else {
    echo "Componente no encontrado";
    exit;
}
?>
