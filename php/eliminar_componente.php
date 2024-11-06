<?php
$conexion = new mysqli('localhost', 'root', '', 'baldi_tech');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM componentes WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        echo "Componente eliminado correctamente";
    } else {
        echo "Error al eliminar el componente: " . $conexion->error;
    }
} else {
    echo "ID del componente no especificado.";
}

$conexion->close();

header("Location: /baldi_tech/home.php");
exit;
?>
