<?php
// Datos de conexión
$host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
$usuario = 'root'; // Tu usuario de la base de datos
$contraseña = ''; // Tu contraseña de la base de datos
$base_de_datos = 'baldi_tech'; // El nombre de tu base de datos

// Crear la conexión
$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
