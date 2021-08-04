<?php
include('lib/abajo.php');
include('lib/secciones.php');
include('lib/categoria.php');
include("conexion.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Entra ya!!! Vende y compra lo que quieras,
    publica tus productos o servicios en el mercado virtual mas completo y con  mejores servicios de la República Dominicana">
    <meta name="google" content="nositelinkssearchbox" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
    <script src="https://kit.fontawesome.com/e0e40a6e1d.js" crossorigin="anonymous"></script>
    <title>El Mercado RD</title>
</head>
<body>
<main>
<?php
Headera ();

?>
<div class="resultadoB">
<h5>Resultado encontrado con su busqueda de "<span style="color: #c99806;"><?php echo ($_GET["searched"]); ?></span>"  </h5> 
<div class="divisor"></div>
</div>

<section class="conenido-Productos">
        <div class="container">
          <div class="row filaProductos">
<?php

include 'conexion.php';
$conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
// MySQL query that selects all the images
$stm = $conexion->query("
SELECT  productos.precio as 'precio',
productos.titulo as 'titulo',
 fotos.ruta  
 FROM `productos` left join `fotos`
  on productos.id_pub = fotos.producto 
where productos.`titulo` like '%".$_GET['searched']."%' GROUP by productos.fecha desc ");
/* 
echo "number of rows: " . $stmt->num_rows;
echo "number of rows: " . $stmt->num_rows;
*/
while ($row = $stm->fetch_assoc()) {
?>
<a href="#">
  <div class="cabeceraPro">
   <div class="IMGproductos"
    style="background-image:url(Productos/<?php echo($row['ruta']);?>)"
     alt="<?php echo( $row['titulo']);  ?>">
                        
    </div>
    <div class="descripcion">
      <h5>
        <?php echo ($row['titulo']);  ?> 
        <br>
        <?php echo ($row['precio']);  ?> 
      </h5>
    </div>
  </div>
</a>
<?php
}
?>


</div>
</div>
</section>



<?php
footerba ();
?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>