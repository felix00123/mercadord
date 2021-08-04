<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Inicia sesión</title>
     <script src="js/formularioLogin.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="./css/stylesLogin.css">
     <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
</head>
<body>
     <div class="contenedor">
          <header>
               <a href="index" class="logo">
                    <img src="img/20200710_120406.png" alt="logo">
               </a>
          </header>
          <main>
               <div class="contenedor-texto">
                    <div class="wrap">
                         <h3>Inicia sesión</h3>
                         <form action="verificando.php" method="POST" class="formulario" name="formulario_registro" id="formulario_login">
                         <?php 
                              if(isset($_GET['error'])){
                                   echo '<center>Datos No Validos</center>';
                              }
                         ?>
                              <div>
                                   <div class="input-group">
                                        <input type="text" class="" id="user" name="user" placeholder="Usuario" required>
                                        <small id="alerta1" class="alerta1"></small>
                                   </div>
                                   <div class="input-group">
                                        <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
                                        <small id="alerta2" class="alerta2"></small>
                                   </div>
                                   <button type="submit" class="btn-link" id="enviar">
                                        Iniciar
                                   </button>
                                   <div class="input-group crearRecuperar">
                                     
                                        <a href="crearCuenta" class="crearCuenta">¿No tienes cuenta?, Crea una aqui</a>
                                        <a href="#" class="recuperarCueta">¿Olvidaste tu cuenta?</a>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
               <div class="contenedor-img">
                    <img src="./img/undraw_add_to_cart_vkjp.svg" alt="">
                    <h3 class="titulo">Mercado RD es la tienda virtual con<br>todo lo que necesitas para <span class="typed"></span></h3>
               </div>
               
          </main>
     </div>
	<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
     <script src="./js/main.js"></script>
     <script src="programable.js"></script>
</body>
</html>