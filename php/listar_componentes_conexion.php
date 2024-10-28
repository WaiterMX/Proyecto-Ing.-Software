<?php
            $conexion = new mysqli('localhost', 'root', '', 'baldi_tech');
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            $sql = "SELECT * FROM componentes";
            $resultado = $conexion->query($sql);
?>