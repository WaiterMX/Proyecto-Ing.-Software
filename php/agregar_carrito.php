<?php
session_start();

// Obtener los datos del producto desde el formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : 'imagenes/mouse.avif';

// Verificar si el carrito ya está en la sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verificar si el producto ya está en el carrito
$encontrado = false;
foreach ($_SESSION['carrito'] as &$producto) {
    if ($producto['id'] === $id) {
        $producto['cantidad'] += $cantidad; // Incrementa la cantidad agregada
        $encontrado = true;
        break;
    }
}
unset($producto);

// Si el producto no estaba en el carrito, añadirlo
if (!$encontrado) {
    $_SESSION['carrito'][] = [
        'id' => $id,
        'nombre' => $nombre,
        'imagen' => $imagen,
        'precio' => $precio,
        'cantidad' => $cantidad
    ];
}

$_SESSION['mensaje'] = 'Componente agregado al carrito';
// Redirigir de vuelta a la lista de componentes
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
header("Location: listar_componentes.php?categoria=$categoria");
exit;
?>
