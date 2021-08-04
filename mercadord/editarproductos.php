
<?php
include('lib/secciones.php');
include('lib/categoria.php');
include("conexion.php");
include 'conexion.php';
              $conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
              // MySQL query that selects all the images
              $stmt = $conexion->query("SELECT * FROM `productos`  WHERE `id_pub` = '".$_GET['fotoproducto']."' and `usuario` ='".$_GET['user']."' ");

               $queryalbum = $conexion->query("SELECT`album`  FROM `fotos` WHERE usuario = '".$_GET['user']."' and producto = '".$_GET['fotoproducto']."' LIMIT 1");
            
               $album = $queryalbum->fetch_array(MYSQLI_ASSOC);
            $row2 = $stmt->fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Entra ya!!! Vende y compra lo que quieras,
    publica tus productos o servicios en el mercado virtual mas completo y con mejores servicios de la República Dominicana">
    <meta name="google" content="nositelinkssearchbox" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/formProductos.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
    <script src="https://kit.fontawesome.com/e0e40a6e1d.js" crossorigin="anonymous"></script>
    <script src="js/publicarPro.js"></script>
    <title>VentasRD</title>
</head>
<body>
  
<?php
echo Headera ();
?>
  <div class="main">
  <span class="opciones">
        <div class="dropup">
            <button type="button" class="btn btn-info opcion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bars"></i>
            </button>
            <div class="dropdown-menu">
            <?php
              if(isset($_SESSION['user']))
              {
            ?>
                <a class="dropdown-item" href="./publicarProducto"><i class="fas fa-cart-plus"></i>  Publicar</a>
                <a class="dropdown-item" href="./PerfilUsuario"><i class="fas fa-user-circle"></i> Tu cuenta</a>
                <a class="dropdown-item" href="cerrarsesion"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
            <?php
            }
            else{
            ?>
              <a class="dropdown-item" href="login"><i class="fas fa-sign-in-alt"></i>  Iniciar sesión</a>
            <?php
              }
            ?>
            </div>
        </div>
    </span>
    <section>
      <div class="form-editar">
          <h5>Editar el anuncio</h5>
          <dir class="divisor"></dir>
          <form action="#" method="post" enctype="multipart/form-data" class="form-producto" name="form_Perfil">
            <div class="form-row">
                <div class="col-md-6">
                  <label for="nameArticulo">Título del anuncio</label>
                  <input type="text" class="form-control" name="titulo"  value="<?php echo ($row2['titulo']) ?>">
                </div>
                <div class="col-md-6">
                  <label for="precioArticulo">Precio</label>
                  <input type="text" class="form-control" name="precio"  value="<?php echo ($row2['precio']) ?>">
                </div>
                <div class="col-md-12">
                  <label for="desArticulo">Descripción</label>
                  <textarea type="text" class="form-control" name="contenido" cols="30" rows="8"><?php echo ($row2['contenido']) ?></textarea>
                </div>

                <?php
                  function esselected($val , $valvariable ){
                    if($valvariable== $val){
                    echo 'selected'; }
                  }
                  ?>
                    <div class="col-md-6">
                      <label for="catArticulo"> categoría :</label>
                      <select name="categoria" id="catArticulo"  name="categoria"  class="form-control" onblur="myValidar()">
                        <option value="0"<?php  esselected(0,$row2['categoria']); ?> >seleccione</option>
                        <option value="1"  <?php  esselected(1,$row2['categoria']); ?> > Bebes y niños</option>
                        <option value="2" <?php  esselected(2,$row2['categoria']); ?> >Computadoras y accesorios</option>
                        <option value="3" <?php  esselected(3,$row2['categoria']); ?>>Deporte</option>
                        <option value="4"<?php  esselected(4,$row2['categoria']); ?>>Electronica</option>
                        <option value="5"<?php  esselected(5,$row2['categoria']); ?>>Hogar</option>
                        <option value="6"<?php  esselected(6,$row2['categoria']); ?>>Inmuebles en venta/alquiler</option>
                        <option value="7"<?php  esselected(7,$row2['categoria']); ?>>Moda y belleza</option>
                        <option value="8"<?php  esselected(8,$row2['categoria']); ?>>Telefonos</option>
                        <option value="9"<?php  esselected(9,$row2['categoria']); ?>>Vehiculos</option>
                        <option value="10" <?php  esselected(10,$row2['categoria']); ?> >Otros</option>
                      </select>
                    </div>
                <div class="col-md-6">
                  <label for="nameArticulo">Marca(Opcional)</label>
                  <input type="text" class="form-control" name="marca"   value="<?php echo ($row2['marca']) ?>">
                </div>
                <div class="col-md-6">
                  <label for="nameArticulo">Fecha publicación</label>
                  <input type="text" class="form-control"   disabled value="<?php echo ($row2['fecha']) ?>" >
                </div>
                  <div class="col-md-6">
                    <?php if ($_SESSION['estado'] = 1 ){ ?>
                      <div class="radio">
                        <input type="radio" name="estado" checked value="1" id="nuevo">
                        <label for="nuevo">nuevo</label>
                        <input type="radio" name="estado" value="0" id="usado">
                        <label for="female">usado</label>
                      </div>
                    <?PHP }else {
                    ?>
                    <div class="radio">
                      <input type="radio" name="estado" value="1" id="nuevo">
                        <label for="male">nuevo</label>
                        <input type="radio" name="estado" checked value="0" id="usado">
                        <label for="female">usado</label>
                    </div>
                    <?PHP
                    }
                    ?>
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
                    <button type="submit" name="publicar" class="btn btn-primary general en"><i class="fas fa-save"></i> Guardar</button>
                    <a href="./index" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</a>
                  </div>
            </div>
          </form>
      </div>
    </section>
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
	                    
	
	                    $result = mysqli_query( $conexion ,"SHOW TABLE STATUS WHERE `Name` = 'productos'");
	                    $data = mysqli_fetch_assoc($result);
                      $next_increment = $data['Auto_increment'];
                      $albumaleatorio = substr(strtoupper(md5(microtime(true))),9,19);
                      $subirmg = mysqli_query($conexion ,"UPDATE `productos` SET `titulo`= '".$_POST['titulo'] ."', `precio`= '".$_POST['precio'] ."',`contenido`='".$_POST['contenido'] ."', `marca`= '".$_POST['marca'] ."',`estado`= '".$_POST['estado'] ."',`categoria`='".$_POST['categoria']."' WHERE productos.id_pub = '".$_GET['fotoproducto'] ."' and productos.usuario='". $_GET['user']."'" );
                      
      
                  if( isset(  $_FILES["foto"]["name"]))    {
               

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

	
	                    $subirimg = mysqli_query($conexion , "INSERT INTO fotos (`usuario`,`fecha`,`ruta`,`album`,`producto`) values ('".$_SESSION['ID']."',now(),'$nombre','".$album['album']."','".$_GET['fotoproducto']."')");
	
	                    
	
	                    }
	                    else
	                    {
	                
	                    }
                      
                
	              
                  }
                      
	                   

                 
	               
	
                    }
                  
	
                    if($subirmg || $subirimg  ) {echo '<script>window.location="PerfilUsuario"</script>';}
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
</html>
