<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Componentes</title>
    <link rel="stylesheet" href="lista.css">
</head>
<body>

    <h1>Listado de Componentes</h1>

    <div class="container">
        <?php
        session_start(); // Iniciar la sesión
        include 'listar_componentes_conexion.php';
        ?>

        <!-- Ventana emergente (modal) para el mensaje -->
        <div id="mensajeModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <p id="mensajeTexto"></p>
            </div>
        </div>

        <?php
        // Mostrar mensaje si existe
        if (isset($_SESSION['mensaje'])) {
            echo "<script>
                    document.getElementById('mensajeTexto').innerText = '" . $_SESSION['mensaje'] . "';
                    document.getElementById('mensajeModal').style.display = 'block';
                    setTimeout(closeModal, 3000); // Cerrar automáticamente después de 3 segundos
                </script>";
            unset($_SESSION['mensaje']); // Limpiar el mensaje de la sesión
        }
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                
                    echo "<div class='card'>";
                    echo "<img src='" . $fila['imagen'] . "' alt='Imagen del componente'>";
                    echo "<h2>" . $fila['nombre'] . "</h2>";
                    echo "<p class='price'>Precio: $" . number_format($fila['precio'], 2) . "</p>";
                    echo "<p>En stock: " . $fila['cantidad'] . "</p>";
                    echo "<div class='buttons'>";

                    // Botón para añadir al carrito
                    echo "<form action='agregar_carrito.php' method='POST'>";
                    echo "<input type='hidden' name='id' value='" . $fila['id'] . "'>";
                    echo "<input type='hidden' name='nombre' value='" . $fila['nombre'] . "'>";
                    echo "<input type='hidden' name='precio' value='" . $fila['precio'] . "'>";
                    echo "<input type='hidden' name='categoria' value='" . $_GET['categoria'] . "'>";
                    echo "<input type='hidden' name='imagen' value='" . $fila['imagen'] . "'>";
                    echo "<input type='number' name='cantidad' min='1' max='" . $fila['cantidad'] . "' value='1'>";
                    echo "<button type='submit'>Añadir al carrito</button>";
                    echo "</form>";

                                
                

                // Solo mostrar los botones si el usuario ha iniciado sesión
                if (isset($_SESSION['username'])) {
                    
                    echo "<a href='editar_componente.php?id=" . $fila['id'] . "'>Editar</a>";
                    
                    echo "<a href='eliminar_componente.php?id=" . $fila['id'] . "' class='delete' onclick='return confirm(\"¿Estás seguro de eliminar este componente?\")'>Eliminar</a>";
                }
                


                echo "</div>";
                echo "</div>";
            }

        } else {
            echo "<p>No se encontraron componentes</p>";
        }
        echo "<a href='/baldi_tech/home.php' style='text-decoration: none;'>
        <button style='padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;'>Regresar a Inicio</button>
      </a>";
        echo "<a href='/baldi_tech/home.php' style='text-decoration: none;'>";
        
        $conexion->close();
        ?>
    </div>
    <script>
    function closeModal() {
        document.getElementById('mensajeModal').style.display = 'none';
    }
    </script>

</body>
</html>

