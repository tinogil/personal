<?php 
require './admin/config.php';
if (!isset($_SESSION))
{
session_start();

}
//conectamos a la base de datos
$conex = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Comprueba que se conecta
if ($conex->connect_error)
{
    die("Connection failed: " . $conex->connect_error);
} 
$conex->set_charset(DB_CHARSET);
include './templates/header.php';
include 'menu.php';
echo  '<main class="blue-grey lighten-4">
        <!-- Navegación lateral para el móvil o las pantallas pequeñas + click para ocultarla -->
        <!-- This is an anchor toggling the off-canvas -->
        <a href="#my-id" uk-toggle></a>';
$sql='SELECT * FROM programas p ,categorias c WHERE p.id_categoria = c.id_categoria ORDER BY nombre';
     $result=$conex->query($sql);
     if(!empty($_GET['id'])){
         
        $row=$result->fetch_assoc();

      echo '<!-- Tarjeta del programa en emisión -->
        <div class="uk-card uk-card-default uk-grid-collapse   uk-child-width-1-2@m  uk-margin uk-margin-left uk-margin-right uk-card-hover" uk-grid>
            <div class="uk-card-media-left uk-cover-container ">
                <img src="https://media1.britannica.com/eb-media/00/7900-004-912AF742.jpg" alt="El mar en movimiento" uk-cover>
                <canvas width=225 height=183></canvas>
            </div>
            <div>
                <div class="uk-card-header">
                    <h1 class="uk-card-title">En Antena</h1>
                </div>
                <div class="uk-card-body">
                    <h4>Solo Jazz</h4>
                    <p class="uk-text-meta "><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                    <p>Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="uk-card-footer">
                    <a href="#" class="uk-button uk-button-outline-blue-grey">Read more</a><br>
                </div>
            </div>
        </div>';
     }
      echo '<div><h1>Programas</h1></div><div><table><tr><th>Nombre</th><th>Categoria</th><th>activo</th></tr>';
     while($row=$result->fetch_assoc()){
           
            echo '<tr><td><a href="./programa.php?id='.$row['id_programa'].'">'.$row['nombre'].'</a></td>
            <td>'.$row['tipo'].'</td>
            <td>'.$row['activo'].'</td>
            
            
            </tr>';
     }    
        echo '</table></div>';
include './templates/foot.php';