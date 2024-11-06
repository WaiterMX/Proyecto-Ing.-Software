<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion = new mysqli('localhost', 'root', '', 'baldi_tech');

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];
    
    // Manejo de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $carpetaDestino = 'imagenes_componentes/';
        
        // Crear la carpeta si no existe
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }
        
        // Generar un nombre único para evitar conflictos
        $nombreImagen = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $rutaArchivo = $carpetaDestino . $nombreImagen;
        
        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaArchivo)) {
            // Inserción de datos en la base de datos con la ruta de la imagen
            $sql = "INSERT INTO componentes (nombre, precio, cantidad, categoria, imagen) VALUES ('$nombre', '$precio', '$cantidad', '$categoria', '$rutaArchivo')";
            
            if ($conexion->query($sql) === TRUE) {
                $mensaje = "Componente agregado exitosamente";
                $tipo = "success";
            } else {
                $mensaje = "Error al agregar el componente: " . $conexion->error;
                $tipo = "error";
            }
        } else {
            $mensaje = "Error al subir la imagen.";
            $tipo = "error";
        }
    } else {
        $mensaje = "No se subió ninguna imagen o hubo un error.";
        $tipo = "error";
    }
    
    $conexion->close();
    
    // Mostrar mensaje con diseño
 // Mostrar mensaje con diseño
 echo "
 <div style='text-align: center; margin-top: 20px;'>
     <h2 style='color: " . ($tipo === 'success' ? 'green' : 'red') . ";'>$mensaje</h2>
     <a href='/baldi_tech/home.php' style='text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px; display: inline-block; margin-top: 20px;'>Regresar a Inicio</a>
 </div>
 ";
}
?>
