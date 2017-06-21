<?php
$aray = array();
//prohibe el acceso directo a la página
if(empty($_SESSION['iden']) || $_SESSION['iden']!=1){
     echo '<h1>PROHIBIDO</h1><p>No tiene permiso para ver esta página</p>';
 }elseif(isset($_GET['new']) && $_GET['new']==1){   //si se ha identificado y ha solicitado crear un programa nuevo
 $sql='SELECT * FROM categorias ORDER BY tipo';
 $result=$conex->query($sql);
 echo '<form method="POST" action="./index.php?function=add" enctype="multipart/form-data">
 <label>Nombre del programa</label><br>
<input type="text" name="nombre" placeholder="ponle nombre..."><br>
<label class="uk-form-label uk-margin-small-right ">Imagen</label><input type="file" class=" uk-margin "  multiple placeholder="Pon la ruta..." name="imag"><br>
 <label class="uk-form-label uk-margin-small-right ">Descripción</label>
 <br> <textarea class="uk-textarea uk-margin  " name="descri" rows="5" placeholder="Descripción..."></textarea><br>
 <label class="uk-form-label uk-margin-small-right ">Contenido del último programa</label>
 <br> <textarea class="uk-textarea uk-margin  " name="des_ultim" rows="5" placeholder="Último programa..."></textarea><br>
 <label class="uk-form-label uk-margin-small-right ">Archivo del último programa</label><input type="file" class=" uk-margin "  multiple placeholder="Pon la ruta..." name="sonido"><br>
 <select name="cat">';
  
  while($row=$result->fetch_assoc()){

echo '<option value="'.$row['id_categoria'].'">'.$row['tipo'].'</option>';
 }

 echo ' </select>
 <input type="submit">Enviar</input>   <input type="reset">Borrar</input>
 </form>';
 
 
 }
     else{   // comprueba si se ha solicitado procesar la información de un programa nuevo
         if(isset($_GET['function']) && ( $_GET['function']=="add") && !empty($_POST["nombre"])){
         
        $aray['nombre']=$_POST["nombre"];
        $aray['descripcion']=$_POST["descri"];
        $aray['imagen']=$_FILES["imag"]["name"];
        if(isset($_POST["des_ultim"])){
        $aray['desc_ultimo']=$_POST["des_ultim"];
        }else{
            $aray['desc_ultimo']="";
        }
        if(isset($_POST["sonido"])){
        $aray['file_ultimo']=$_POST["sonido"];
        }else{
            $aray['file_ultimo']="";
        }
        
        $aray['id_categoria']=$_POST["cat"];
        upload();
            
         $sql="INSERT INTO programas (nombre, descripcion, imagen, desc_ultimo, file_ultimo,	id_categoria, activo ) VALUES ('".$aray['nombre']."', '".$aray['descripcion']."','".$aray['imagen']."','".
         $aray['desc_ultimo']."', '".$aray['file_ultimo']."', '".$aray['id_categoria']."', 1)";
         echo $sql;
         if($conex->query($sql)==true){
            echo '<div class="uk-alert-succes" uk-alert>El programa se ha guardado correctamente</div>';
        }
        else{
            echo '<div class="uk-alert-danger" uk-alert>El programa no se ha guardado correctamente</div>';
        }
     }
     //Consulta y muestra los programas que hay en la base de datos con enlace para ser editados
     $sql='SELECT * FROM programas p ,categorias c WHERE p.id_categoria = c.id_categoria ORDER BY nombre';
     $result=$conex->query($sql);
      echo '<div><table><tr><th>Nombre</th><th>Categoria</th><th>activo</th></tr>';
     while($row=$result->fetch_assoc()){
           
            echo '<tr><td><a href="./index.php?id='.$row['id_programa'].'">'.$row['nombre'].'</a></td>
            <td>'.$row['tipo'].'</td>
            <td>'.$row['activo'].'</td>
            
            
            </tr>';
     }    
        echo '</table></div>';
        echo '<button type="button"  onclick=location.assign("./index.php?new=1")>Nuevo</button>';

     }
     
