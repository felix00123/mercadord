<?php

include ("conexion.php");
session_start();
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/logindesign.css">
	<link rel="stylesheet" href="css/registro.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="Imagenes/icono.ico">
	<script src="script/validacion1.js"></script>
	<title>Registrarse</title>
</head>
<body>
<script type="text/javascript" src="js/registro.js"></script>
	<div class="contenedor-formulario animated fadeInDown delay-1">
		<div class="wrap">
			<form action="registrando" class="formulario" name="formulario_registro" onsubmit="return validar();" method="POST">
				<div>
                
					
					<div align="center">
 <a href="index.php"><img src="img/icono.ico" alt=""  width="30%"></a>
 </div>
                 <h1 class="h11">Registro de usuarios</h1>
                 <hr>
					
					
					<div class="input-group">
						<label class="label" for="user">Nombre de usuario:</label>
						<input type="text" id="user" name="user">
						<p id="valida111" style="color:red;"  ><?php if(isset($_GET['variable1'])) echo($_GET['variable1']) ?> </p>
	
						<p id="valida1"  style="color:red;" ></p>
                    </div>
					<div class="input-group">
						<label class="label" for="nombre">Nombre:</label>
						<input type="text" id="nombre" name="nombre">
						<p id="valida2"  style="color:red;" ></p>
                    </div>
                    <div class="input-group">
						<label class="label" for="Apellido">Apellido:</label>
                        <input type="text" id="Apellido" name="apellido">
						<p id="valida3"  style="color:red;" ></p>
                    </div>

					<div class="input-group">
						<label class="label" for="correo">Correo:</label>
						<input type="text" id="correo" name="correo">
						<p id="valida4"  style="color:red;" ></p>
						<p id="valida111" style="color:red;"  ><?php if(isset($_GET['variable1'])) echo($_GET['variable2']) ?> </p>
					</div>
					<div class="input-group">
						<label class="label" for="pass">Contraseña:</label>
						<input type="password" id="pass" name="pass">
						<p id="valida5"  style="color:red;" ></p>
					</div>
					<div class="input-group">
						<label class="label" for="pass2">Repetir Contraseña:</label>
						<input type="password" id="pass2" name="pass2">
						<p id="valida6c"  style="color:red;" ></p>
                    </div>
                    <div class="input-group">
						<label for="cedula">Cedula:</label>
                        <input type="text" name="cedula" id="cedula">
						<p id="valida6"  style="color:red;" ></p>
						<p id="valida111" style="color:red;"  ><?php if(isset($_GET['variable1'])) echo($_GET['variable3']) ?> </p>
					</div>
					
					<div class="input-group">
						<label for="fechanac">Fecha de Nacimiento:</label>
                        <input type="date" name="fechanac" id="fechanac">
						<p id="valida7"  style="color:red;" ></p>
					</div>
					
					
					
					<div class="input-group">
						<label for="telefono">Telefono:</label>
                        <input type="text"  name="telefono" id="telefono">
						<p id="valida8"  style="color:red;" ></p>
					</div>
					<div class="input-group">
						<label class="label" for="dire">Direccion:</label>
						<input type="text" id="dire" name="dire">
						<p id="valida9"  style="color:red;" ></p>
					</div>
					<div class="input-group radio">
						<input type="radio" name="sexo" id="hombre" value="M">
						<label for="hombre">Hombre</label>
						<input type="radio" name="sexo" id="mujer" value="F">
						<label for="mujer">Mujer</label>
                        <p id="valida11" style="color:red;" ></p>
					
					</div>
                    <p id="valida10" style="color:red;" ></p>
					<div class="input-group checkbox">
						<input type="checkbox" name="terminos" id="terminos" value="true">
						<label for="terminos"> Acepto los <a href="TC.PHP" class="aaa" target=»_blank»>Terminos y Condiciones </a> </label> 
					
					</div>
					
                    <input type="submit" id="btn-submit" value="Registrarse">
					<a href="iniciarseccion" class="lickiniciar">Iniciar Sección</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>