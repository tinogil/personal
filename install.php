<?php
include 'templates/header.php';
$sql='';
;
//comprobamos si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" )
{

    if(isset($_POST['user']))  //comprobamos si es el formulario de los datos de la BD
    {
    $file = fopen("./admin/config.php", "w") or die("No puedo abrir o crear el archivo!");
    $str="<?php 
	define('DB_HOST','localhost'); 
    define('DB_USER','".$_POST['user']."'); 
    define('DB_PASS','".$_POST['pass']."'); 
    define('E_MAIL','".$_POST['mail']."'); 
    define('DB_NAME','radio2'); 
    define('DB_CHARSET','utf8');";
    fwrite($file,$str);     //creamos el archivo de configuración
    fclose($file);
    $file2 = fopen("./radio.sql", "r") or die("No puedo abrir o crear el archivo!");
    
$sql=fread($file2,filesize("./radio.sql"));

fclose($file2);
    }
    // Creamos la conexión
    
     include './admin/config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
// comprobamos la conexión
if ($conn->connect_error)
    {
    die("La conexión falló: " . $conn->connect_error);
    }
// Creamos la BD
$sql2 = "CREATE DATABASE IF NOT EXISTS `radio2` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci";

if ($conn->query($sql2) === TRUE)
    {
       
    echo "La base de datos se ha creado <br>";
    } 
    else 
    {
    echo "Error creando la base de datos: " . $conn->error;
    }

 
    //conectamos a la base de datos
   
$conn->select_db( DB_NAME);
// Comprueba que se conecta

if ($conn->connect_error)
    {
    die("Connection failed: " . $conex->connect_error);
    } 
//$sql=$conn->real_escape_string($sql);

if($conn->multi_query($sql)===true && $conn->next_result()==true)
    {
    echo '<div uk-grid class=" uk-flex-center uk-text-center "><div></div><h1>Instalación de la aplicación</h1>';
    echo 'Las tablas han sido creadas satisfactoriamente<br>';
    echo 'Seguidamente incluya los datos de usuario y contraseña para ser administrador, su nombre de usuario será el email:<br>';
echo '<form action="install.php" method="post">
	<label>Nombre</label><br><input type="text" name="admin" placeholder="nombre..." size="15"><br><label>Apellidos</label><br><input type="text" name="surname" placeholder="Apellidos..." size="15"><br><label>Contraseña</label><br><input type="password" placeholder="contraseña..." name="passw" size="15">
	<br><label>Confirmar contraseña</label><br><input type="password" placeholder="contraseña..." name="passw2" size="15"><br><label>Correo electrónico personal</label><br><input type="text" name="mail2" placeholder="email..." size="15"><br>
    <br><input type="submit" value="submit" class="uk-button uk-button-blue-grey"></form></div></div>';

    }
    else if($conn->multi_query($sql)===false)
    {
   
    echo 'No han podido ser creadas las tablas.';
    }

if(isset($_POST['admin']))
{
       if($_POST['passw']==($_POST['passw2']))
    {
$str='INSERT INTO empleados(nivel, nombre, apellido, email, pass) VALUES ( 3,"'.$_POST['admin'].'","'.$_POST['surname'].'","'.$_POST['mail2'].'","'.password_hash($_POST['passw'], PASSWORD_DEFAULT).'");';

if(($conn->query($str))!=true){
     echo 'Ha fallado la configuración del administrador. Intentelo de nuevo.';
    
}
else{
   echo 'La instalación se ha realizado con éxito.';
}
    }
    else
    {
        echo '<div uk-grid class=" uk-flex-center uk-text-center "><div></div><h1>Instalación de la aplicación</h1>';
echo '<div></div><div>Para instalar la aplicación escriba los detalles de la base de datos:</div>';
echo '<div></div><div >
    No coinciden las contraseñas<br>';
     echo 'Seguidamente incluya los datos de usuario y contraseña para ser administrador, su nombre de usuario será el email:<br>';
echo '<form action="install.php" method="post">
	<label>Nombre</label><br><input type="text" name="admin" placeholder="nombre..." size="15"><br><label>Apellidos</label><br><input type="text" name="surname" placeholder="Apellidos..." size="15"><br><label>Contraseña</label><br><input type="password" placeholder="contraseña..." name="passw" size="15">
	<br><label>Confirmar contraseña</label><br><input type="password" placeholder="contraseña..." name="passw2" size="15"><br><label>Correo electrónico personal</label><br><input type="text" name="mail2" placeholder="email..." size="15"><br>
    <br><input type="submit" value="submit" class="uk-button uk-button-blue-grey"></form></div></div>';
    }
}
$conn->close();
}
else
{
echo '<div uk-grid class=" uk-flex-center uk-text-center "><div></div><h1>Instalación de la aplicación</h1>';
echo '<div></div><div>Para instalar la aplicación escriba los detalles de la base de datos:</div>';
echo '<div></div><div >
	<form action="install.php" method="post">
	<label>Usuario de la base de datos</label><br><input type="text" name="user" placeholder="usuario..." size="15"><br><label>Contraseña</label><br><input type="password" placeholder="contraseña..." name="contra" size="15">
	<br><label>Correo electrónico</label><br><input type="text" name="mail" placeholder="email..." size="15"><br>
    <br><input type="submit" value="submit" class="uk-button uk-button-blue-grey"></form></div></div>';
    
}