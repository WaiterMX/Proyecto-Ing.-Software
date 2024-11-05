<?php
session_start();
unset($_SESSION['carrito']); // Elimina la variable 'carrito' de la sesión
header("Location: carrito.php"); // Redirige de vuelta a la página del carrito
exit;
?>
