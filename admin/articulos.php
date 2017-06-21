<?php
//prohibimos el acceso directo a la página
if(empty($_SESSION['iden']) || ($_SESSION['iden']!=1))
{
     echo '<h1>PROHIBIDO</h1><div class="uk-alert-danger" uk-alert>No tiene permiso para ver esta página</div>';
 }
 else
 {
//impromimos el formulario de los artículo
 echo '<div>
 <form method="POST" action="./index.php" class="uk-form-stacked" enctype="multipart/form-data">
  <fieldset class="uk-fieldset uk-padding">
  <legend class="uk-legend">Noticias</legend>
 <label class="uk-form-label uk-margin-small-right ">Título</label>
 <input type="text" class="uk-width-1-3 uk-margin " placeholder="Pon el título..." name="titulo">
 <br><label class="uk-form-label uk-margin-small-right ">Imagen</label><input type="file" class=" uk-margin "  multiple placeholder="Pon la ruta..." id="imag" name="imag">
 <br> <textarea class="uk-textarea uk-margin  " name="cuerpo" rows="5" placeholder="Artículo..."></textarea>
 <br>   <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>
 <label>Tarjeta del artículo</label><br>
            <label><input class="uk-radio" type="radio" name="radio2"  value="1" checked> 1</label>
            <label><input class="uk-radio" type="radio" name="radio2" value="2"> 2</label>
            <label><input class="uk-radio" type="radio" name="radio2" value="3"> 3</label>
            
        </div>
        <input type="submit" class="uk-button uk-button-outline-blue-grey" value="Enviar">
        </fieldset>
 </form></div>';
    
}

