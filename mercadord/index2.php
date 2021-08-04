<?php
include('lib/secciones.php');
include('lib/categoria.php');
include("conexion.php");
?>
<?php
	
	
	include 'conexion.php';
	$conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
	// MySQL query that selects all the images
	$stmt = $conexion->query('SELECT * FROM `fotos` WHERE `usuario` ="'. $_GET['user'].'" and `producto` ="'. $_GET['fotoproducto'].'"');
     $secondquery = $conexion->query('SELECT  * FROM `productos` INNER join usuarios on usuarios.id_usuario= "'. $_GET['user'].'"  WHERE productos.id_pub=  "'. $_GET['fotoproducto'].'" limit 1');
	 $queryimagenprincipal = $conexion->query('SELECT * FROM `fotos` WHERE `usuario` ="'. $_GET['user'].'" and `producto` ="'. $_GET['fotoproducto'].'" limit 1');
    $imagenprincipal = $queryimagenprincipal->fetch_array(MYSQLI_ASSOC);
	 $row2 = $secondquery->fetch_array(MYSQLI_ASSOC);

	$dir = 'productos/'; /* carpeta para imágenes miniatura */
	$scan = scandir($dir);	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="es" prefix="og: http://ogp.me/ns#">
<head>
<title><?php echo $row2['titulo'] ?></title>
	<meta name="google" content="nositelinkssearchbox" >
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Entra ya!!! Vende y compra lo que quieras,
    publica tus productos o servicios en el mercado virtual mas completo y con mejores servicios de la República Dominicana">
    <meta name="google" content="nositelinkssearchbox" >
    <meta property="og:locale" content="es_ES">
    <meta property="og:title" content="<?php echo $row2['titulo'] ?>">
    <meta property="og:type" content="store">
    <meta property="og:description" content="Entra ya!!! Vende y compra lo que quieras,
    publica tus anuncios o servicios en el mercado virtual mas completo y con mejores servicios de la República Dominicana">
    <meta property="og:url" content="">
    <meta property="og:image" content="img/20200710_120406.png">
	<meta property="og:site_name" content="Mercado RD">
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e0e40a6e1d.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/default.css" />
	<link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
	<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script>
      window.onscroll = function (){
          var scroll = document.documentElement.scrollTop || document.body.scrollTop;
          if(scroll > 50){
            document.getElementById('divCategorias').classList.add('categoriasF')
          }
          else
          {
            document.getElementById('divCategorias').classList.remove('categoriasF')
          }
      }
    </script>
</head>
<body>

<?php
echo Headera ();

echo categoriasw ()

?>
</header>

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
	<div class="contenido">
		<p>Categoria: </p>
		<!-- <dir class="divisorPro"></dir> -->
		
		<main>
			<div class="galeriaPro">
					<?php
						$featured_dir = 'productos/'; /* carpeta para imágenes grandes */
						$scan = scandir($featured_dir);
						
					?>
				<div id="featured" style='background-image: url("productos/<?php echo $imagenprincipal['ruta']?>");'>
					<h3>	</h3>
				</div><!--end featured-->
				<ul id="options">
					<?php
					while ($row = $stmt->fetch_assoc()) {
					/* solamente leerá ficheros jpg */
							echo '
								<li>
								<a href="' . $featured_dir.$row2["titulo"] . '">
								<img src="' . $dir.$row["ruta"] . '" alt="'. $row["ruta"] . '" name="'. $row2["titulo"].'" />
								</a>
								</li>';
					
					}; 
					?>
				</ul>
				
			</div><!--end container-->
			<div class="descripcionPro">
				<div class="contenidoIMG">
					<div class="fotoCueta" style='background-image: url("fotos/<?php echo $row2['fotoperfil']?>.jpg");'>

					</div>
					<div class="datosPersonales">
						<h5><?php echo $row2['nombre']." ".$row2['apellido'] ?></h5>
						<div class="datos">
							<div>
								<p style="color:#C99806;"><i class="fas fa-phone-square-alt"></i> <?php echo $row2['telefono']?></p>
							</div>
							<div>
								<p style="color:#C99806;"><i class="fas fa-map-marker-alt"></i> <?php echo ($row2['direccion']);  ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="btnChat">
					<a href="#" class="btn-chat"><i class="fas fa-comments"></i> Escribirle a este vendedor</a>
					<a href="OtherPerfil?user=<?php echo ($row2['usuario'])?>" class="btn-Perfil"><i class="fas fa-address-card"></i> Ver perfil</a>
				</div>
				<div class="datosProducto">
					<h1><?php echo $row2['titulo'] ?></h1>
					<h3><span>RD$</span> <?php echo $row2['precio']?></h3>
				</div>
			</div>
		</main>
		<div class="contenido-producto">
			<h2>Descripción</h2>
			<p style="color: black; font-weight: normal;"><?php echo $row2['contenido']?></p>
		</div>
		<div class="relacionados">
			<h2>Más relacionados: </h2>
		</div>
	</div>
    <!--Pie de pagina-->
    <?php
    include('lib/abajo.php');
    echo footerba ();
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
