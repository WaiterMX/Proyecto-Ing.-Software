<?php
$conexion = new mysqli('localhost', 'root', '', 'baldi_tech');
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

if (!empty($categoria)){
    $sql= "SELECT * FROM componentes WHERE categoria='$categoria'";
} else {
    $sql = "SELECT * FROM componentes";
}

$resultado = $conexion->query($sql);
?>