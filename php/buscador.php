<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'baldi_tech';

// Establecer la conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Procesar la búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $busqueda = $conexion->real_escape_string($_POST['search']);
    
    // Puedes realizar tu consulta aquí si deseas mostrar resultados
    // Si solo quieres redirigir, puedes hacerlo directamente
    header("Location:http://localhost/baldi_tech/php/listar_componentes.php?categoria=" . urlencode($busqueda));
    exit; // Detiene la ejecución
}

// Cerrar conexión
$conexion->close();
?>
