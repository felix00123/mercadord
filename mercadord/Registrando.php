<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "santodomingordventas";
 $tbl_name = "usuarios";
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE username = '$_POST[user]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

$buscarUsuariobycorreo = "SELECT * FROM $tbl_name WHERE correo = '$_POST[correo]' ";

 $result2 = $conexion->query($buscarUsuario);

 $count2 = mysqli_num_rows($result2);

$buscarUsuariobycedula = "SELECT * FROM $tbl_name WHERE cedula = '$_POST[cedula]' ";

 $result3 = $conexion->query($buscarUsuario);

 $count3 = mysqli_num_rows($result3);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
    <title>¡Todo lo que necesitas!</title>
</head>
<body>
<div align="center">
<a href="index"><img width="400px" height="200" src="img/icono.ico" alt="logo de la pagina"></a>

<?php
 if ($count == 1  ) {

 header("location: crearCuenta?variable1=El Nombre de Usuario ya esta en uso");
 
 }
 else if($count2 == 1){
 header("location: crearCuenta?variable2=El correo ya esta en uso ");
  } else if($count3 == 1){
 header("location: crearCuenta?variable3=la cedula ya esta en uso ");
  }


else if($_POST['pass']== $_POST['pass2']){
    
    $pass_cifrado=password_hash($_POST['pass'], PASSWORD_DEFAULT);
    
 $query = "INSERT INTO usuarios (username,nombre,apellido,mail,fecha_nac,genero,cedula,telefono,
 direccion,password) VALUES ('$_POST[user]', '$_POST[nombre]' , '$_POST[apellido]' ,
           '$_POST[correo]' , '$_POST[fechanac]' ,'$_POST[sexo]','$_POST[cedula]' , '$_POST[telefono]' ,
           '$_POST[dire]' ,'$pass_cifrado')";
}
 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['user'] . "</h4>" . "\n\n";
 echo "<h5>" . "Volver a la pagina " . "<a href='index'>principal</a>" . "</h5>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 
 mysqli_close($conexion);
?>
   </div> 
      
</body>
</html>
    
   