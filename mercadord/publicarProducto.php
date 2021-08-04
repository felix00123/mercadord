<?php
include ("conexion.php");
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
    <meta name="google" content="nositelinkssearchbox">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/formProductos.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
    <script src="https://kit.fontawesome.com/e0e40a6e1d.js" crossorigin="anonymous"></script>
    <script src="js/publicarPro.js"></script>
    <title>Publicar Anuncio</title>
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
      </div>
    </header>
    <main>
      <section>
        <div class="from-publicar">
          <h5>Publicar un anucio</h5>
          <dir class="divisor"></dir>
          <form action="#" method="post" enctype="multipart/form-data" class="form-producto" name="form_producto">
            <div class="form-row">
              <div class="col-md-6">
                <label for="nameArticulo">Título del anuncio</label>
                <input type="text" class="form-control" name="nombre" id="nameArticulo" autocomplete="off" onblur="myValidar()">
              </div>
              <div class="col-md-6">
                <label for="precioArticulo">Precio</label>
                <input type="number" class="form-control" id="precioArticulo" name="precio" autocomplete="off" onblur="myValidar()">
              </div>
              <div class="col-md-12">
                <label for="desArticulo">Descripción</label>
                <textarea name="descripcion" id="desArticulo" cols="30" rows="5" class="form-control" autocomplete="off" onblur="myValidar()"></textarea>
              </div>
              <div class="col-md-6">
                <label for="catArticulo">¿A qué categoría pertenece?</label>
                <select name="categoria" id="catArticulo" class="form-control" onblur="myValidar()">
                  <option value="0" selected>seleccione</option>
                  <option value="1">Bebes y niños</option>
                  <option value="2">Computadoras y accesorios</option>
                  <option value="3">Deporte</option>
                  <option value="4">Electronica</option>
                  <option value="5">Hogar</option>
                  <option value="6">Inmuebles en venta/alquiler</option>
                  <option value="7">Moda y belleza</option>
                  <option value="8">Telefonos</option>
                  <option value="9">Vehiculos</option>
                  <option value="10">Otros</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="nameArticulo">Marca(Opcional)</label>
                <input type="text" class="form-control" name="marca" id="marca" autocomplete="off">
              </div>
              <div class="col-md-6 radios">
                <div class="radio">
                  <input type="radio" name="estado" value="1" id="male">
                  <label for="male">Nuevo</label>
                  <input type="radio" name="estado" value="0" id="female">
                  <label for="female">Usado</label>
                </div>
                <span class="badge badge-warning" id="alertSmall">Debe seleccionar el estado, es obligatorio</span>
              </div>
              <div class="col-md-12 selectfile">
                <label for="exampleFormControlFile1" class="labelFile"><i class="fas fa-images"></i> Selecciona las imagenes</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto[]" accept="image/*"  multiple onchange="handleFiles(this.files)">
                <div class="smallFile">
                  <small>Puedes subir hasta 10 fotos</small>
                </div>
                <div class="alert alert-warning" id="alertaFile" role="alert">
                  <strong>Suba las fotos!</strong> Debe seleccionar las fotos de su anuncio de venta.
                </div>
                <div id="fileList">
                </div>
              </div>
              <div class="col-md-12 botonS">
                <button type="submit" name="publicar" class="btn btn-primary general en"><i class="fas fa-plus"></i> Publicar</button>
              </div>
            </div>
          </form>
        </div>
      </section>
    </main>
    <?php 
				include 'conexion.php';
				 $conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);


         if ($conexion->connect_errno) {
          printf("Falló la conexión: %s\n", $conexion->connect_error);
          exit();
      }
	                  if(isset($_POST['publicar'])) 
	                  {
	                    
	
	                    $result = mysqli_query( $conexion ,"SHOW TABLE STATUS WHERE `Name` = 'productos'");
	                    $data = mysqli_fetch_assoc($result);
                      $next_increment = $data['Auto_increment'];
                      $albumaleatorio = substr(strtoupper(md5(microtime(true))),9,19);
      
                  if( isset(  $_FILES["foto"]["name"]))    {
                    $insertalbum=" INSERT INTO albumes (`usuario`,`fecha`,`nombre`) values ('".$_SESSION['ID']."',now(),'". $albumaleatorio."')";

                    $crearalbum = mysqli_query( $conexion , $insertalbum );

                    $idalbum = mysqli_query($conexion , "SELECT * FROM albumes WHERE `usuario` ='".$_SESSION['ID']."' AND `nombre` = '". $albumaleatorio."'");
                    $alb = mysqli_fetch_array($idalbum , MYSQLI_ASSOC) ;
                
	              
                  }
                      
	                   

                      for($x=0; $x<count($_FILES["foto"]["name"]); $x++)
                      {

	                    $alea = substr(strtoupper(md5(microtime(true))), 0,12);
	                    $code = $next_increment.$alea;
                     
	                    $type = 'jpg';
	                    $rfoto = $_FILES['foto']['tmp_name'][$x];
	                    $name = $code.".".$type;
	
	                    if(is_uploaded_file($rfoto))
	                    {
	                      $destino = "productos/".$name;
	                      $nombre = $name;
	                      copy($rfoto, $destino);

	
	                    $subirimg = mysqli_query($conexion , "INSERT INTO fotos (`usuario`,`fecha`,`ruta`,`album`,`producto`) values ('".$_SESSION['ID']."',now(),'$nombre','".$albumaleatorio."','$next_increment')");
	
	                    $llamadoimg = mysqli_query( $conexion ,"SELECT `id__fot` FROM fotos WHERE `usuario` = '".$_SESSION['ID']."' ORDER BY `id__fot` desc");
	                    $llaim = mysqli_fetch_array($llamadoimg , MYSQLI_ASSOC) ;
	
	                    }
	                    else
	                    {
	                     exit;
	                    }
                      
	               
	
                    }
                    $queryasubir ="INSERT INTO productos (`usuario`,`fecha`,`contenido`,`imagen`, `titulo`,`precio`, `estado`,`categoria`,`marca`) values
                    ('".$_SESSION['ID']."',now(),'" .$_POST['descripcion']. "','".$alb['id_alb']."','".$_POST['nombre']."','".$_POST['precio']."','".$_POST['estado']."','".$_POST['categoria']."','".$_POST['marca']."')";

                    $subir = mysqli_query( $conexion , $queryasubir );
	
                    if($subir) {echo '<script>window.location="index.php"</script>';}
                  }      
        ?>
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

    <!--Pie de pagina-->
    <footer class="bg-light">
      <div class="container">
        <div class="row filaDelPiePagina">
          <div class="redes">
            <h5>Redes sociales</h5>
            <a class="btn btn-outline-primary btnFacebook" href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-primary btntwitter" href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-primary btninstagram" href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="conocenos">
            <h5>Conócenos</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">¿Nesesitas ayuda?</a></li>
              <li><a class="text-muted" href="#">Contactenos</a></li>
              <li><a class="text-muted" href="#">Publicidad</a></li>
              <li><a class="text-muted" href="./Terms and Conditions">Términos y Condiciones</a></li>
            </ul>
          </div>
        </div>
        <div>
          <!--<img class="mb-2" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">-->
          <small class="d-block mb-3 text-muted">&copy; 2019-2020 Todos los derechos reservados</small>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>