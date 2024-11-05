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
        foreach ($_SESSION['carrito'] as $producto) {
            $id = $producto['id']; // Obtener el ID del producto del array
            $cantidad = $producto['cantidad'];
            
            // Actualizar la tabla de componentes restando la cantidad comprada
            $sql = "UPDATE componentes SET cantidad = cantidad - ? WHERE id = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, 'ii', $cantidad, $id);
            mysqli_stmt_execute($stmt);
            
            // Verifica si la actualización se realizó correctamente
            if (mysqli_stmt_affected_rows($stmt) < 1) {
                throw new Exception("Error al actualizar el componente con ID: $id");
            }
        }

        // Si todo va bien, confirma la transacción
        mysqli_commit($conexion);
        echo "<p>Compra finalizada con éxito.</p>";
        // Aquí puedes vaciar el carrito si lo deseas
        unset($_SESSION['carrito']);
    } catch (Exception $e) {
        // En caso de error, revierte la transacción
        mysqli_rollback($conexion);
        echo "<p>Error al finalizar la compra: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>No hay productos en el carrito.</p>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
