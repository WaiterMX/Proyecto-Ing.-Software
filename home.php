<!DOCTYPE html>
<html lang="en">
<head>
    <title>BaldiTech</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
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
            echo  "<a href='/baldi_tech/php/agregar_componente.php' style='text-decoration: none;'>
            <button style='padding: 10px 15px; background-color: #101820; color: white; border: none; border-radius: 5px; cursor: pointer;'>Agregar componentes</button>
            </a>";
            }
            ?>
          <div class="search_bar">
            <input type="search" placeholder="Busca tus componentes aqui...">
          </div>
    
    
          <div class="row">
            <p>Selecciona lo que andas buscando <span>7</span> componentes distintos</p>
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
            <div class="job_salary">
              <h4>$6.7 - $12.5k /yr</h4>
              <span>1 days ago</span>
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
            <div class="job_salary">
              <h4>$8.7 - $13.2k /yr</h4>
              <span>2 days ago</span>
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
            <div class="job_salary">
              <h4>$11 - $18.5k /yr</h4>
              <span>2 days ago</span>
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
            <div class="job_salary">
              <h4>$6 - $11.5k /yr</h4>
              <span>3 days ago</span>
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
            <div class="job_salary">
              <h4>$12.5 - $25.5k /yr</h4>
              <span>4 days ago</span>
            </div>
          </div>
        </div>
        </section>
      </div>
    
    </body>
    </html>