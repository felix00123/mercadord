<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/icono.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src=" http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/script.js"></script>
    <title>El Mercado | ¡Todo lo que necesitas!</title>
</head>
<body>
    <!--Cabecera de la pagina-->
    <header class="text-center">
        <!--Menus de navegacio-->
        <nav class="navbar navbar-static-top bg-white border-bottom shadow-sm" role="navigation">
            <div class="container col-xs-12">
                <a href="index"><img class="logo" src="img/logo.png" alt="logo de la pagina"></a>
                    <div align="center" class="divAling">
	<section>
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from productos where idproductos=".$_GET['id'])or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>
			
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<span>Precio: <?php echo $f['precio'];?></span><br>
				<span>Descripcion: <?php echo $f['descripcion'];?></span><br>
                <span>Estado <?php echo $f['estado '];?></span><br>
				            </center>
		
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>