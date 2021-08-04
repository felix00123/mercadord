<?php
session_start();
include "conexion.php";
$tbl_name = "usuarios";
 

$user =$_POST['user'];
$buscarhash = "SELECT * FROM $tbl_name WHERE username = '$user'";


$resulthash = $conexion->query($buscarhash);
$counthash = mysqli_num_rows($resulthash);

 $row = $resulthash->fetch_array(MYSQLI_ASSOC);
if( $counthash==1){
    
    $passs = $_POST['pass'];

   $hash = $row['password'];
    if(password_verify( $passs , $hash)){
      
     $_SESSION['user'] = $row['username'];
     $_SESSION['nombre'] = $row['nombre'];
     $_SESSION['apellido'] = $row['apellido'];
     $_SESSION['email'] = $row['mail'];
     $_SESSION['ID'] = $row['id_usuario'];
     $_SESSION['fotoperfil'] = $row['fotoperfil'];
     $_SESSION['fechanac'] = $row['fecha_nac'];
     $_SESSION['genero'] = $row['genero'];
     $_SESSION['cedula'] = $row['cedula'];
     $_SESSION['telefono'] = $row['telefono'];
     $_SESSION['direccion'] = $row['direccion']; 
   header("location: index");
        
    }
else
{


    echo "<br />". "Usuario o clave incorrectos." . "<br />";
    header("location: login?variable1=usuario o clave incorrectos");
    
}
}
?>

