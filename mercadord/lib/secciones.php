<?php
function Headera () 
{
  session_start();
?>
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
      
   
<?php
}
?>