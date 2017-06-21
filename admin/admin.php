<?php
//cierra la sesión
if(isset($_GET['desc']) && $_GET['desc']==1)
{
    unset($_SESSION['iden']);
}
 if(empty($_SESSION['iden']) || ($_SESSION['iden']!=1))  //impide el acceso si no se está identificado
 {
     echo '<h1>PROHIBIDO</h1><div class="uk-alert-danger" uk-alert>No tiene permiso para ver esta página</div>';
 }
 else
 {      //muestra la interfaz de administración
include '../menu.php';
echo '
<div class="uk-child-width-1-5@s uk-text-center" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body uk-margin-medium-top uk-margin-small-left"><p>Bienvenido al interface de administración: '.$_SESSION['user'].'</p><p><a href="http://'.$_SERVER['SERVER_NAME'].'/personal/admin/index.php?desc=1">Desconectar</a></p></div>
    </div>
     <div class="uk-width-3-4@s uk-margin-small-right "><ul uk-tab>
    <li class=""><a href="#" >Shows</a></li>
    <li><a href="#">Artículos</a></li>
    <li ><a href="#">Programación</a></li>
</ul>
               <ul class="uk-switcher uk-margin white">
                  <li>';
                    include './shows.php';
                echo '   </li>   <li>';
                    include './articulos.php';
                   echo '  </li> <li> ';
                    include './calendar.php';
                  echo ' </li> 
                </ul>
            </div>
            
        </div>
';
}