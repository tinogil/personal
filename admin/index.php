<?php 
include 'config.php';
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

include '../templates/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
        
        $user = $_POST["user"];
         $pass=$_POST["contra"];
        
        
     $_SESSION['iden']=login($conex,$user,$pass);
     
      if($_SESSION['iden']==1)
        {      
include 'admin.php';
 
        }
        else
        {
    echo '<p>No ha sido correcto el login</p>';
    no_login();
        }
}
else
{
   
no_login();
}
include '../templates/foot.php';
$conex->close();
function no_login()
{
     echo '<div uk-grid class=" uk-flex-center uk-text-center "><div></div><div class=" uk-flex-center  uk-width-1-4@s uk-margin z-depth-3" uk-alert><a class="uk-alert-close" uk-close></a>
	<form action="index.php" method="post">
	<fieldset><legend>Login</legend><label>Usuario</label><br><input type="text" name="user" placeholder="usuario o email" size="15"><br><label>Contraseña</label><br><input type="password" placeholder="contraseña" name="contra" size="15"></fieldset>
	<input type="submit" value="submit" class="uk-button uk-button-blue-grey"></form></div><div></div></div>';
}
function login($conex,$user,$pass)
{
  $str='SELECT email, pass FROM empleados WHERE nivel = 3';
$result=$conex->query($str);

    while($row=$result->fetch_assoc())
    {
        
        if($user==$row['email'] AND (password_verify( $pass, $row['pass'])==true))
        {
    return 1;
        }
        else
        {
    return 0;
        }
    }
}