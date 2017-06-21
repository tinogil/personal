<?php 
include 'config.php';
include '../clases.php';
//iniciamos la sesion de administrador
if (!isset($_SESSION))
{
session_start();

}
//Comprobamos si ya está identificado
if(empty($_SESSION["iden"])){
    $_SESSION['iden']=0;
}
//conectamos a la base de datos
$conex = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Comprueba que se conecta
if ($conex->connect_error)
{
    die("Connection failed: " . $conex->connect_error);
} 
$conex->set_charset(DB_CHARSET);
include '../templates/header.php';
//realiza el login
if (($_SERVER["REQUEST_METHOD"] == "POST") && !empty($_POST["user"]))
{
        
        $_SESSION['user'] = $_POST["user"];
         $pass=$_POST["contra"];
     $_SESSION['iden']=login($conex,$_SESSION['user'],$pass);
      if($_SESSION['iden']==1)
        {      
include 'admin.php'; //muestra la interfaz
 
        }
     else
        {
    echo '<div class="uk-alert-danger" uk-alert>No ha sido correcto el login</div>';
    no_login();
        }
}
     
       //comprueba si se identificó antes 

elseif(($_SESSION['iden']==1) && ((($_SERVER["REQUEST_METHOD"] == "POST") &&(empty($_POST["user"])))||($_SERVER["REQUEST_METHOD"] == "GET")))
{
   include 'admin.php';

}
else
        {      
no_login();
 
        }
//comprueba si se ha enviado el formulario de un artículo
if (($_SERVER["REQUEST_METHOD"] == "POST") && !empty($_POST['radio2']) )
    {
    $sql='SELECT id_noticia FROM news WHERE card="'.$_POST['radio2'].'" AND activa IS TRUE';
   
    $result=$conex->query($sql);
        
            while($row=$result->fetch_assoc())
            {
$sql='UPDATE news SET activa=0 WHERE id_noticia='.$row['id_noticia'];  //desactiva la noticia de ese cuadro

$conex->query($sql);

             }
       //añade3 la noticia nueva
    $sql="INSERT INTO news(titulo, cuerpo, imag, card,  activa) VALUES ('".$_POST['titulo']."', '".$_POST['cuerpo']."', '".$_FILES['imag']["name"]."', '".$_POST['radio2']."', true)";
 
 upload();
        if($conex->query($sql)==true)
        {
       echo '<div class="uk-alert-success" uk-alert>El artículo ha sido guardado correctamente</div>';
        }
        else
        {
       echo '<div class="uk-alert-danger" uk-alert>No ha sido guardado el artículo</div>';
        }
    }
$conex->close();
include '../templates/foot.php';
//función para volver a mostrar el formulario de login si no se ha identificado o ha fallado el usuario o la contraseña
function no_login()
{
     echo '<div uk-grid class=" uk-flex-center uk-text-center "><div></div><div class=" uk-flex-center  uk-width-1-4@s uk-margin z-depth-3" uk-alert><a class="uk-alert-close" uk-close></a>
	<form action="index.php" method="post">
	<fieldset><legend>Login</legend><label>Usuario</label><br><input type="text" name="user" placeholder="usuario o email" size="15"><br><label>Contraseña</label><br><input type="password" placeholder="contraseña" name="contra" size="15"></fieldset>
	<input type="submit" value="submit" class="uk-button uk-button-blue-grey"></form></div><div></div></div>';
}
// funci´n para comprobar la identificación
function login($conex,$user,$pass)
{
  $str='SELECT email, pass FROM empleados WHERE nivel = 3';
$result=$conex->query($str);

    while($row=$result->fetch_assoc())
    {
        
        if($user==$row['email'] AND (password_verify( $pass, $row['pass'])))
        {
    return 1;
        }
        else
        {
    return 0;
        }
    }
}
// la función que sube los archivos(de momento solo las imagenes)
function upload(){
   
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["imag"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Comprueba si la imagen lo es de verdad o es un fake
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imag"]["tmp_name"]);
    if($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}
// comprueba si el archivo ya existe
if (file_exists($target_file)) {
    echo '<div class="uk-alert-warning" uk-alert>Lo sentimos, el archivo ya existe.</div>';
    $uploadOk = 0;
}
// comprueba el tamaño del archivo
if ($_FILES["imag"]["size"] > 500000) {
    echo '<div class="uk-alert-warning" uk-alert>Lo sentimos, tu archivo es demasiado grande.</div>';
    $uploadOk = 0;
}
// Solo se permiten ciertos formatos
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo $target_file;
    echo $imageFileType;
    echo '<div class="uk-alert-warning" uk-alert>Lo sentimos, solo los archivos JPG, JPEG, PNG & GIF son permitidos.</div>';
    $uploadOk = 0;
}

// CComprueba si $uploadOk se pone a  0 por un error
if ($uploadOk == 0) {
    echo '<div class="uk-alert-danger" uk-alert>Lo sentimos, ha ocurrido un error subiendo tu archivo.</div>';
// Si todo va bien intenta subir el archivo
} else {
    if (move_uploaded_file($_FILES["imag"]["tmp_name"], $target_file)) {
        echo '<div class="uk-alert-succes" uk-alert>El archivo '. basename( $_FILES["imag"]["name"]).' se ha subido.</div>';
    } else {
        echo '<div class="uk-alert-danger" uk-alert>Lo sentimos, ha ocurrido un error subiendo tu archivo.</div>';
    }
}}

?>
