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
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
    <script src="https://kit.fontawesome.com/e0e40a6e1d.js" crossorigin="anonymous"></script>
    <title><?php echo $_SESSION['nombre'];  ?></title>
</head>
<body>
  <style>
    @media (max-width: 768px) {

    .opciones {
        display: block;
    }
    .btnLogin {
        display: none;
    }
    aside.sidebarPerfil
    {
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
        height: auto;
        float: left;
        text-align: center;
        border-radius: 10px;
        -webkit-box-shadow: 1px 1px 3px 3px rgba(146,161,176,.15);
        box-shadow: 1px 1px 3px 3px rgba(146,161,176,.15);
    }
    .conenido-Productos {
        width: 100%;
        float: right;
        padding: 10px;
        margin-bottom: 30px;
        border-radius: 10px;
        -webkit-box-shadow: 1px 1px 3px 3px rgba(146,161,176,.15);
        box-shadow: 1px 1px 3px 3px rgba(146,161,176,.15);
    }
    .filaProductos {
    display: flex;
    justify-content: center;
    background-size: cover;
    }

.filaProductos a:hover {
    text-decoration: none;
  }

}
  </style>
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
<?php
include 'conexion.php';
$conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
              // MySQL query that selects all the images
              if(isset($_SESSION['user'])){
                $userName=$_SESSION['nombre'];
                $stmt = $conexion->query("SELECT * FROM usuarios WHERE nombre= '$userName'");
                $row = $stmt->fetch_assoc();
              }
?>
    <div class="tituloPerfil">
      <h4>Tu perfil</h4>
      <dir class="divisor"></dir>
    </div>
    <div class="contenido">
      <aside class="sidebarPerfil">
      <?php if ($_SESSION['fotoperfil'] == null) { ?>
        <div class="contenidoPerfilImg">
            <div class="fotoCuenta" style="background-image: url('img/undraw_profile_pic_ic5t.svg');">

            </div>
            <div class="nombreCuenta">
              <h5><?php echo ( $_SESSION['nombre']." ".$_SESSION['apellido'] ) ?></h5>
            </div>
        </div>
      <?php } else{  ?>
        <div class="contenidoPerfilImg">
            <div class="fotoCuenta" style="background-image: url('fotos/<?php echo( $_SESSION['fotoperfil']).'.jpg'; ?>');">

            </div>
            <div class="nombreCuenta">
              <h5><?php echo ( $_SESSION['nombre']." ".$_SESSION['apellido'] ) ?></h5>
            </div>
        </div>
      <?php
        }
      ?>
        <div class="bodyContent">
          <div>
            <p><i class="fas fa-envelope-open-text"></i> <?php echo ($row['mail']);  ?></p>
          </div>
          <div>
            <p><i class="fas fa-phone-square-alt"></i> <?php echo ($row['telefono']);  ?></p>
          </div>
          <div>
            <p><i class="fas fa-map-marker-alt"></i> <?php echo ($row['direccion']);  ?></p>
          </div>
        </div>
        <div class="btn-editar">
          <a href="PerfilEditar">Editar</a>
        </div>
      </aside>
    
      <main class="contenidoMain">
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
                header("location: index");
                }
              ?>
              </div>
          </div>
        </span>
        <section class="conenido-Productos">
          <div class="titleAnuncio">
            <h5>Tus anuncios</h5>
          </div>
        <div class="container">
          <div class="row filaProductos">
              <?php
              include 'conexion.php';
              $conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
              // MySQL query that selects all the images
              $stmt = $conexion->query("SELECT albumes.nombre, fotos.ruta, productos.titulo, productos.contenido FROM `albumes` 
              left join `fotos` on albumes.nombre = fotos.album   
              join `productos`  on fotos.producto = productos.id_pub WHERE `albumes`.`usuario` = '$_SESSION[ID]';");
            
              while ($row = $stmt->fetch_assoc()) {
              ?>
              <a href="editarproductos?user=<?php echo ($row['usuario'])?>&fotoproducto=<?php echo ($row['producto'])?>">
                <div class="cabeceraPro">
                  <div class="IMGproductos" style="background-image:url(Productos/<?php echo ($row['ruta']);  ?>" alt="<?php echo( $row['titulo']);  ?>)">
                    
                  </div>
                  <div class="descripcion">
                    <h5>
                      <?php echo ($row['titulo']);  ?> 
                    </h5>
                  </div>
                </div>
              </a>
            <?php
            }
       

            if($row < 1)
            {
               echo ("Usted no tiene ningun producto arriba todavia.");  
            }
            ?>
          </div>
        </div>
        </section>
      </main>
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
