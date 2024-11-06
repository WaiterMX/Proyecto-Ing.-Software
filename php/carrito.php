<?php
session_start();
echo "<h1 style='text-align: center; color: #101820; font-family: Arial, sans-serif; margin-top: 50px;'>Carrito de Compras</h1>";

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    echo "<table style='width: 80%; margin: 30px auto; border-collapse: collapse; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);'>
            <thead style='background-color: #007BFF; color: white;'>
                <tr>
                    <th style='padding: 12px; border: 1px solid #dddddd;'>Imagen</th>
                    <th style='padding: 12px; border: 1px solid #dddddd;'>Nombre</th>
                    <th style='padding: 12px; border: 1px solid #dddddd;'>Precio</th>
                    <th style='padding: 12px; border: 1px solid #dddddd;'>Cantidad</th>
                    <th style='padding: 12px; border: 1px solid #dddddd;'>Subtotal</th>
                </tr>
            </thead>
            <tbody>";
    
    $total = 0;

    foreach ($_SESSION['carrito'] as $id => $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;
        $imagen = isset($producto['imagen']) ? $producto['imagen'] : 'imagenes/mouse.avif';
        echo "<tr style='background-color: #f9f9f9;'>
                <td style='padding: 10px; border: 1px solid #dddddd; text-align: center;'>
                    <img src='" . $imagen . "' style='width: 100px; height: auto; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);'>
                </td>
                <td style='padding: 12px; border: 1px solid #dddddd; font-family: Arial, sans-serif;'>{$producto['nombre']}</td>
                <td style='padding: 12px; border: 1px solid #dddddd; font-family: Arial, sans-serif;'>\${$producto['precio']}</td>
                <td style='padding: 12px; border: 1px solid #dddddd; font-family: Arial, sans-serif;'>{$producto['cantidad']}</td>
                <td style='padding: 12px; border: 1px solid #dddddd; font-family: Arial, sans-serif;'>\$$subtotal</td>
              </tr>";
    }

    echo "<tr style='background-color: #e9ecef; font-weight: bold;'>
            <td colspan='4' style='text-align: right; padding: 12px; border: 1px solid #dddddd;'>Total:</td>
            <td style='padding: 12px; border: 1px solid #dddddd;'>\$$total</td>
          </tr>";
    echo "</tbody></table>";
   
    echo "<div style='text-align: center; margin: 40px 0;'>
            <a href='finalizar_compra.php' style='text-decoration: none;'>
                <button style='padding: 12px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px; transition: background-color 0.3s;'>
                    Finalizar compra
                </button>
            </a>
          </div>";

    echo "<form action='vaciar_carrito.php' method='POST' style='text-align: center;'>
            <button type='submit' style='padding: 12px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px; transition: background-color 0.3s;'>Vaciar Carrito</button>
          </form>";

} else {
    echo "<div style='text-align: center; margin: 50px;'>
            <p style='color: #707070; font-size: 20px; font-family: Arial, sans-serif;'>Tu carrito está vacío.</p>
            <a href='/baldi_tech/home.php' style='text-decoration: none;'>
                <button style='padding: 12px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px; transition: background-color 0.3s;'>
                    Ir a la tienda
                </button>
            </a>
          </div>";
}
?>
