<!DOCTYPE html>
<html lang="en">
<head>
    <title>BaldiTech</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<style>
        /* Estilo del cuadro de búsqueda */
        .search-box {
            width: 250px;
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 25px 0 0 25px;
            font-size: 16px;
            outline: none;
        }

        /* Estilo del botón de búsqueda */
        .search-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: 2px solid #007bff;
            border-left: none;
            border-radius: 0 25px 25px 0;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        /* Contenedor de los botones y el buscador */
        .action-container {
            display: flex;
            align-items: center;
            gap: 10px; /* Espacio entre los elementos */
            margin-top: 10px;
        }
    </style>

    <div class="container">
        <nav>
            <div class="navbar">
                <div class="img">
                <img src="imagenes/bladitech(negro).png" style="width: 100%; height: auto; max-width: 100px;">
                    <h1 class="hi">BaldiTech</h1>
                </div>
                <ul>

                    <?php
                    session_start(); // Inicia la sesión

                    // Muestra el botón de cerrar sesión solo si el usuario ha iniciado sesión
                    if (isset($_SESSION['username'])) {
                        echo '<li><a href="php/logout.php" class="logout">Cerrar Sesión</a></li>';
                    } else {
                        echo '<li><a href="php/login.php" class="login">Iniciar Sesión</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <section class="main">
            <div class="main-top">
                <p>SI NECESITAS TECNOLOGIA, TENEMOS BALDES LLENOS!!</p>
                
            </div>
          <div class="main-body">
            <h1>Componentes</h1>
            <?php
                if (isset($_SESSION['username'])) {
                    echo "<a href='/baldi_tech/php/agregar_componente.php' style='text-decoration: none; margin-right: 10px;'>
                    <button style='padding: 10px 15px; background-color: #101820; color: white; border: none; border-radius: 5px; cursor: pointer;'>Agregar componentes</button>
                    </a>";
                    echo "<a href='/baldi_tech/php/carrito.php' style='text-decoration: none;'>
                    <button style='padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;'>Ver carrito</button>
                    </a>";
                }
                ?>
             <form method="POST" action="/baldi_tech/php/buscador.php" style="display: flex;">
                        <input type="text" name="search" class="search-box" placeholder="Buscar...">
                        <button type="submit" class="search-button">Buscar</button>
                    </form>
        <?php
// Conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'baldi_tech';

// Establecer la conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Procesar la búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $busqueda = $conexion->real_escape_string($_POST['search']);
    
    // Puedes realizar tu consulta aquí si deseas mostrar resultados
    // Si solo quieres redirigir, puedes hacerlo directamente
    header("Location:http://localhost/baldi_tech/php/listar_componentes.php?categoria=" . urlencode($busqueda));
    exit; // Detiene la ejecución
}

// Cerrar conexión
$conexion->close();
?>
     
            
 
    
    
          <div class="row">
            <p>Selecciona lo que andas buscando <span>5</span> componentes distintos</p>
          </div>
    
          <div class="job_card" onclick="window.location.href='php/listar_componentes.php?categoria=procesadores'">
            <div class="job_details">
              <div class="img">
                <img src="imagenes/procesadores.jpg" style="width: 100%; height: auto; max-width: 100px;">
              </div>
              <div class="text">
                <h2>Procesadores</h2>
                <span>Intel y AMD</span>
              </div>
            </div>
          </div>
          
          <div class="job_card" onclick="window.location.href='php/listar_componentes.php?categoria=monitores'" >
            <div class="job_details">
              <div class="img">
                <img src="imagenes/monitores.jpg" style="width: 100%; height: auto; max-width: 100px;">
              </div>
              <div class="text">
                <h2>Monitores</h2>
                <span>MSI y ASUS</span>
              </div>
            </div>
          </div>
    
          <div class="job_card" onclick="window.location.href='php/listar_componentes.php?categoria=ventiladores'">
            <div class="job_details">
              <div class="img">
                <img src="imagenes/ventiladores.jpg" style="width: 100%; height: auto; max-width: 100px;">
              </div>
              <div class="text">
                <h2>Ventiladores</h2>
                <span>Corsair y XPG</span>
              </div>
            </div>
          </div>
    
          <div class="job_card" onclick="window.location.href='php/listar_componentes.php?categoria=Tarjetas Graficas'">
            <div class="job_details">
              <div class="img">
                <img src="imagenes/tarjetas graficas.jpg" style="width: 100%; height:auto; max-width: 100px;"> 
              </div>
              <div class="text">
                <h2>Tarjetas Graficas</h2>
                <span>RTX y RX</span>
              </div>
            </div>
          </div>
    
          <div class="job_card" onclick="window.location.href='php/listar_componentes.php?categoria=mouse'">
            <div class="job_details">
              <div class="img">
                <img src="imagenes/mouse.avif" style="width: 100%; height:auto; max-width: 100px;"> 
              </div>
              <div class="text">
                <h2>Mouse</h2>
                <span>Logitech y Razer</span>
              </div>
            </div>
          </div>
        </div>
        </section>
      </div>
    
    </body>
    </html>