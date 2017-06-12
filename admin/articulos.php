<?php
if(empty($_SESSION['iden']) || $_SESSION['iden']!=1){
     echo '<h1>PROHIBIDO</h1><p>No tiene permiso para ver esta página</p>';
 }else{

 echo '<div>
 <form class="uk-form-stacked">
  <fieldset class="uk-fieldset uk-padding">
  <legend class="uk-legend">Noticias</legend>
 <label class="uk-form-label uk-margin-small-right ">Título</label>
 <input type="text" class="uk-width-1-3 uk-margin " placeholder="Pon el título..." name="titulo">
 <br><label class="uk-form-label uk-margin-small-right ">Imagen</label><input type="file" class=" uk-margin " placeholder="Pon la ruta..." name="imag">
 <br> <textarea class="uk-textarea uk-margin  " rows="5" placeholder="Artículo..."></textarea>
 <br>   <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>
 <label>Tarjeta del artículo</label><br>
            <label><input class="uk-radio" type="radio" name="radio2"  value="1" checked> 1</label>
            <label><input class="uk-radio" type="radio" name="radio2" value="2"> 2</label>
            <label><input class="uk-radio" type="radio" name="radio2" value="3"> 3</label>
            
        </div>
        <input type="submit" class="uk-button uk-button-outline-blue-grey" value="Enviar">
        </fieldset>
 </form></div>';
 if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql='SELECT id_noticia FROM news WHERE card='.$_POST['radio2'].' AND activa=true';
    $result=$conex->query($sql);
    if($row=$result->fetch_assoc()){
    while($row==true){

    }
    }
}
 }