<?php
include('lib/secciones.php');
include('lib/categoria.php');
include("conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Entra ya!!! Vende y compra lo que quieras,
    publica tus productos o servicios en el mercado virtual mas completo y con mejores servicios de la República Dominicana">
    <meta name="google" content="nositelinkssearchbox" >
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylePerfil.css">
    <script src="https://kit.fontawesome.com/e0e40a6e1d.js" crossorigin="anonymous"></script>
    <script src="js/editarPerfilJS.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
    <title>Editar Perfil</title>
</head>
<body>
    <header>
      <div class="d-flex flex-column flex-md-row align-items-center px-md-4 bg-white shadow-sm border-bottom navegacion">
        <a href="index" class="logo my-0 mr-md-auto font-weight-normal">
          <img src="img/20200710_120406.png" alt="logo" id="logo">
        </a>
        <nav class="my-2 my-md-0 mr-md-3">
          <form action="#" class="formularioBuscar" method="post" onsubmit="document.getElementById('formBuscar').submit()">
            <div class="inputBuscar">
              <label for="idBuscar"><i class="fas fa-search"></i></label>
              <input type="search" placeholder="Buscar" id="idBuscar" name="searched" autocomplete="off">
            </div>
          </form>
        </nav>

      <?php 
				include 'conexion.php';
				 $conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
         if ($conexion->connect_errno) {
          printf("Falló la conexión: %s\n", $conexion->connect_error);
          exit();
          }
	          if(isset($_POST['searched'])) 
	          {
              {echo '<script>window.location="buscar?searched='.$_POST['searched'].'"</script>';}

            }
	      ?>

        <?php
        
          if(isset($_SESSION['user']))
           {
        ?>
        <a class="btn btn-outline-info btnLogin btnPublicar" href="./publicarProducto"><i class="fas fa-plus"></i> Publicar</a>
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle btnLogin btnUser" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['nombre'];  ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="./PerfilUsuario">Tu cuenta</a>
              <a class="dropdown-item" href="cerrarsesion">Cerrar sesión</a>
          </div>
        </div>
        <?php
           }
           else{
               ?>
        <a class="btn btn-outline-primary btnLogin" href="login">Iniciar sesión</a>
        <?php

              }
        ?>
      </div>
    </header>
    <div class="contenido">
        <div class="titulo">
            <h4>Editar Perfil</h4>
        </div>
        <form action="#" method="post" enctype="multipart/form-data" class="form-producto" name="form_Perfil">
            <div class="contenedorIMGperfil">
            <?php if ($_SESSION['fotoperfil'] == null) { ?>
                <div class="imgCuenta" id="previewIMGperfil" style="background-image: url('/img/undraw_profile_pic_ic5t.svg');">
                    <!-- <img src="" class="rounded-circle d-block m-l-none" alt="" id="cuentaPerfil"> -->
                    <label for="exampleFormControlFile1" class="labelFile"><i class="fas fa-camera"></i></label>
                </div>
            <?php } else{  ?>
                <div class="imgCuenta" id="previewIMGperfil" style="background-image: url('fotos/<?php echo( $_SESSION['fotoperfil']).'.jpg'; ?>');">
                    <!-- <img src="" class="rounded-circle d-block m-l-none" alt="" id="cuentaPerfil"> -->
                    <label for="exampleFormControlFile1" class="labelFile"><i class="fas fa-camera"></i></label>
                </div>
            <?php
                }
            ?>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" style="display:none" name="foto" accept="image/*" onchange="previewIMG(event)">
            </div>
            <div class="contenidoInput">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="nameArticulo">Nombre</label>
                        <input type="text" class="form-control" name="nombre"  value="<?php echo $_SESSION['nombre'] ?>" id="nombre1" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="precioArticulo">Apellido</label>
                        <input type="text" class="form-control" name="apellido" value="<?php echo  $_SESSION['apellido'] ?>" id="apellido1" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="precioArticulo">Email</label>
                        <input type="email" class="form-control" id="email1" value="<?php echo $_SESSION['email'] ?>" name="email" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="precioArticulo">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha"  value="<?php echo $_SESSION['fechanac'] ?>" id="fecha1" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="precioArticulo">Cédula</label>
                        <input type="number" class="form-control" id="cedula" value="<?php echo $_SESSION['cedula'] ?>" name="cedula" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="precioArticulo">Número de teléfono</label>
                        <input type="number" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="form-control" id="telefono" value="<?php echo $_SESSION['telefono'] ?>" name="telefono" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label for="precioArticulo">Dirección</label>
                        <input type="text" class="form-control" id="direccion" value="<?php echo $_SESSION['direccion'] ?>" name="direccion" autocomplete="off">
                    </div>
                    <div class="col-md-6 radios">
                    <?php if ($_SESSION['genero'] = 'M' ){ ?>
                        <div class="radio">
                            <input type="radio" name="sexo" checked value="M" id="hombre">
                            <label for="male">Hombre</label>
                            <input type="radio" name="sexo" value="F" id="mujer">
                            <label for="female">Mujer</label>
                        </div>
                        <?PHP }else {
                        ?>
                        <div class="radio">
                            <input type="radio" name="sexo" value="M" id="hombre">
                            <label for="male">Hombre</label>
                            <input type="radio" name="sexo" checked value="F" id="mujer">
                            <label for="female">Mujer</label>
                        </div>
                        <?PHP
                        } 
                        ?>
                        <span class="badge badge-warning" style="display:none" id="alertSmall">Debe seleccionar el estado, es obligatorio</span>
                    </div>
                    <div class="col-md-12 botonS">
                        <button type="submit" name="publicar" class="btn btn-primary general en"><i class="fas fa-save"></i> Guardar</button>
                        <a href="./index" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php 
				include 'conexion.php';
				 $conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
         if ($conexion->connect_errno) {
          printf("Falló la conexión: %s\n", $conexion->connect_error);
          exit();
          }
	                  if(isset($_POST['publicar'])) 
	                  {
	                    
  
                      /*
                      UPDATE `usuarios` SET `nombre`=$_POST['nombre'],
                      `apellido`=$_POST['apellido'],`mail`=$_POST['email'],
                      `fotoperfil`=$_POST['foto'],`fecha_nac`=$_POST['fecha'],
                      `genero`=$_POST['genero'],`cedula`=$_POST['cedula'],
                      `telefono`=$_POST['telefono'],`direccion`=$_POST['direccion'] WHERE `id_usuario`=
                      */ 


	                    $result = mysqli_query( $conexion ,"SHOW TABLE STATUS WHERE `Name` = 'productos'");
	                    $data = mysqli_fetch_assoc($result);
                      $next_increment = $data['Auto_increment'];
                      $albumaleatorio = substr(strtoupper(md5(microtime(true))),9,19);

                      $desprendible = $_FILES["foto"]['tmp_name'];
      
                  if(!empty($desprendible))    {
                 
	                    $alea = substr(strtoupper(md5(microtime(true))), 0,12);
	                   
                     
	                    $type = 'jpg';
	                    $rfoto = $_FILES['foto']['tmp_name'];
	                    $name =  $alea .".".$type;
	
	                    if(is_uploaded_file($rfoto))
	                    {
	                      $destino = "fotos/".$name;
	                      $nombre = $name;
                        copy($rfoto, $destino);
                             
                     
                      
                      $subirimg = mysqli_query($conexion ,"
                      UPDATE `usuarios` SET `nombre`= '".$_POST['nombre'] ."',
                      `apellido`= '".$_POST['apellido'] ."',`mail`='".$_POST['email'] ."',
                      `fotoperfil`= '".$alea ."',`fecha_nac`= '".$_POST['fecha']."',
                      `genero`= '".$_POST['sexo'] ."',`cedula`='".$_POST['cedula'] ."',
                      `telefono`= '".$_POST['telefono'] ."',`direccion`='".$_POST['direccion']."'
                       WHERE `id_usuario`= '". $_SESSION['ID']."'" );


                       $_SESSION['nombre'] = $_POST['nombre'];
                       $_SESSION['apellido'] = $_POST['apellido'];
                       $_SESSION['email'] = $_POST['email'];
                       $_SESSION['fotoperfil'] = $alea;
                       $_SESSION['fechanac'] = $_POST['fecha'];
                       $_SESSION['genero'] = $_POST['sexo'];
                       $_SESSION['cedula'] = $_POST['cedula'];
                       $_SESSION['telefono'] = $_POST['telefono'];
                       $_SESSION['direccion'] = $_POST['direccion']; 
                       if($subirimg) {echo '<script>window.location="index"</script>';}
	
	                    }
	                
	               
	
                    }
                 
                    else
                    {

                      $subirimg = mysqli_query($conexion ,"
                      UPDATE `usuarios` SET `nombre`= '".$_POST['nombre'] ."',
                      `apellido`= '".$_POST['apellido'] ."',`mail`='".$_POST['email'] ."',
                      `fecha_nac`= '".$_POST['fecha']."',
                      `genero`= '".$_POST['sexo'] ."',`cedula`='".$_POST['cedula'] ."',
                      `telefono`= '".$_POST['telefono'] ."',`direccion`='".$_POST['direccion']."'
                       WHERE `id_usuario`= '". $_SESSION['ID']."'" );



                      
                       $_SESSION['nombre'] = $_POST['nombre'];
                       $_SESSION['apellido'] = $_POST['apellido'];
                       $_SESSION['email'] = $_POST['email'];
                      
                       
                       $_SESSION['fechanac'] = $_POST['fecha'];
                       $_SESSION['genero'] = $_POST['sexo'];
                       $_SESSION['cedula'] = $_POST['cedula'];
                       $_SESSION['telefono'] = $_POST['telefono'];
                       $_SESSION['direccion'] = $_POST['direccion']; 
                       if($subirimg) {echo '<script>window.location="PerfilUsuario"</script>';}
                    }
                    
                   
                   
	
                    
                  }
	    ?>   





    <?php
        include('lib/abajo.php');
        echo footerba ();
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>