<?php
session_start();
echo "<h1>Carrito de Compras</h1>";

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    echo "<table>";
    echo "<tr><th>Imagen</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>";
    $total = 0;

    foreach ($_SESSION['carrito'] as $id => $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;
        $imagen = isset($producto['imagen']) ? $producto['imagen'] : 'imagenes/mouse.avif';
        echo "<tr>
                <td><img src='$imagen';</td>
                <td>{$producto['nombre']}</td>
                <td>\${$producto['precio']}</td>
                <td>{$producto['cantidad']}</td>
                <td>\$$subtotal</td>
              </tr>";
    }

    echo "<tr><td colspan='3'>Total:</td><td>\$$total</td></tr>";
    echo "</table>";
    echo "<a href='finalizar_compra.php'>Finalizar compra</a>";
    

    echo "<form action='vaciar_carrito.php' method='POST'>";
    echo "<button type='submit'>Vaciar Carrito</button>";
    echo "</form>";


} else {
    echo "<p>El carrito está vacío.</p>";
}
?>

