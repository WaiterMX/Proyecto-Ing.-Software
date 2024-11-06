<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    // Muestra el contenido del carrito para depuración
    // Puedes comentar o eliminar la siguiente línea si no deseas ver el array
    // echo "<pre>";
    // print_r($_SESSION['carrito']);
    // echo "</pre>";

    mysqli_begin_transaction($conexion);
    try {
        $productos_comprados = ""; // Variable para almacenar los productos comprados
        foreach ($_SESSION['carrito'] as $producto) {
            $id = $producto['id']; // Obtener el ID del producto del array
            $cantidad = $producto['cantidad'];
            $nombre = $producto['nombre']; // Obtener el nombre del producto
            $precio = $producto['precio']; // Obtener el precio del producto
            $imagen = $producto['imagen']; // Obtener la imagen del producto

            // Agregar el producto a la lista de productos comprados con un diseño más visual
            $productos_comprados .= "
                <div style='background-color: #f9f9f9; padding: 15px; margin: 20px 0; border-radius: 8px; border: 1px solid #ddd; display: flex; align-items: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>
                    <div style='flex: 0 0 100px; margin-right: 20px;'>
                        <img src='" . $imagen . "' style='width: 100%; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>
                    </div>
                    <div style='flex: 1;'>
                        <h3 style='font-size: 22px; color: #333; margin: 0;'>" . $nombre . "</h3>
                        <p style='font-size: 18px; color: #555;'>Precio: <span style='color: #007BFF;'>\$$precio</span></p>
                        <p style='font-size: 18px; color: #555;'>Cantidad: <span style='color: #007BFF;'>$cantidad</span></p>
                        <p style='font-size: 18px; color: #555;'>Subtotal: <span style='color: #007BFF;'>\$(" . number_format($precio * $cantidad, 2) . ")</span></p>
                    </div>
                </div>
            ";
        }

        // Si todo va bien, confirma la transacción
        mysqli_commit($conexion);
        echo "
        <div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>
            <h2 style='color: #28a745; font-size: 36px;'>Compra finalizada con éxito</h2>
            <p style='font-size: 20px; color: #333;'>Has comprado los siguientes productos:</p>
            <div style='margin-top: 20px;'>
                $productos_comprados
            </div>
            <div style='margin-top: 30px;'>
                <a href='/baldi_tech/home.php' style='text-decoration: none; padding: 15px 30px; background-color: #007BFF; color: white; border-radius: 5px; font-size: 18px; transition: background-color 0.3s;'>Regresar a Inicio</a>
            </div>
        </div>
        ";
        // Aquí puedes vaciar el carrito si lo deseas
        unset($_SESSION['carrito']);
    } catch (Exception $e) {
        // En caso de error, revierte la transacción
        mysqli_rollback($conexion);
        echo "<p style='color: red; text-align: center; font-size: 18px;'>Error al finalizar la compra: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<div style='text-align: center; margin-top: 50px; font-family: Arial, sans-serif;'>
            <p style='color: #707070; font-size: 20px;'>No hay productos en el carrito.</p>
            <a href='/baldi_tech/home.php' style='text-decoration: none; padding: 12px 25px; background-color: #007BFF; color: white; border-radius: 5px; font-size: 16px; transition: background-color 0.3s;'>Ir a la tienda</a>
          </div>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
