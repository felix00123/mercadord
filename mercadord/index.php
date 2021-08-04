<?php
include('lib/secciones.php');
include('lib/categoria.php');
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Entra ya!!! Vende y compra lo que quieras,
    publica tus productos o servicios en el mercado virtual mas completo y con mejores servicios de la República Dominicana">
    <meta name="google" content="nositelinkssearchbox" >
    <meta property="og:locale" content="es_ES">
    <meta property="og:title" content="Mercado RD">
    <meta property="og:type" content="store">
    <meta property="og:description" content="Entra ya!!! Vende y compra lo que quieras,
    publica tus anuncios o servicios en el mercado virtual mas completo y con mejores servicios de la República Dominicana">
    <meta property="og:url" content="">
    <meta property="og:image" content="img/20200710_120406.png">
    <meta property="og:site_name" content="Mercado RD">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/e0e40a6e1d.js" crossorigin="anonymous"></script>
    <title>Mercado RD | ¡Todo lo que necesitas!</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/20200710_192627.ico">
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Filtrar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <label for="catArticulo">Provincias:</label>
                <select name="provincias" id="catArticulo" class="form-control">
                  <option value="0" selected>seleccione</option>
                  <option value="azua">Azua</option>
                  <option value="bahoruco">Bahoruco</option>
                  <option value="barahona">Barahona</option>
                  <option value="dajabón">Dajabón</option>
                  <option value="distritoNacional">Distrito Nacional</option>
                  <option value="duarte">Duarte</option>
                  <option value="elíasPiña">Elías Piña</option>
                  <option value="elSeibo">El Seibo</option>
                  <option value="espaillat">Espaillat</option>
                  <option value="hatoMayor">Hato Mayor</option>
                  <option value="hermanasMirabal">Hermanas Mirabal</option>
                  <option value="independencia">Independencia</option>
                  <option value="laAltagracia">La Altagracia</option>
                  <option value="laRomana">La Romana</option>
                  <option value="laVega">La Vega</option>
                  <option value="maríaTrinidadSánchez">María Trinidad Sánchez</option>
                  <option value="monseñorNouel">Monseñor Nouel</option>
                  <option value="monteCristi">Monte Cristi</option>
                  <option value="montePlata">Monte Plata</option>
                  <option value="pedernales">Pedernales</option>
                  <option value="peravia">Peravia</option>
                  <option value="puertoPlata">Puerto Plata</option>
                  <option value="samaná">Samaná</option>
                  <option value="sanCristóbal">San Cristóbal</option>
                  <option value="sanJosédeOcoa">San José de Ocoa</option>
                  <option value="sanJuan">San Juan</option>
                  <option value="sanPedrodeMacorís">San Pedro de Macorís</option>
                  <option value="sánchezRamírez">Sánchez Ramírez</option>
                  <option value="santiago">Santiago</option>
                  <option value="santoDomingo">Santo Domingo</option>
                  <option value="valverde">Valverde</option>
                </select>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-info">Aplicar</button>
            </div>
          </div>
        </div>
      </div>
    <main>
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
             <a class="dropdown-item" href="./publicarProducto"><i class="fas fa-cart-plus"></i>Publicar</a>
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
      <section class="conenido-Productos">
        <div class="container">
          <div class="row filaProductos">
              <?php
               
            
              // MySQL query that selects all the images
              $stmt = $conexion->query('SELECT albumes.nombre,
               productos.usuario,fotos.producto,
              productos.precio as "precio", fotos.ruta,
              productos.titulo, productos.contenido FROM `albumes` 
              left join `fotos` on albumes.nombre = fotos.album   
              join `productos`  on fotos.producto = productos.id_pub
 ');
            
              while ($row = $stmt->fetch_assoc()) {
              ?>
              <a href="index2?user=<?php echo ($row['usuario'])?>&fotoproducto=<?php echo ($row['producto'])?>">
                <div class="cabeceraPro">
                  <div class="IMGproductos"
                  style="background-image:url(Productos/<?php echo($row['ruta']);  ?>)"
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
            <div class="btnMas">
              <a class="btn btn-outline-primary btnVerMas" href="#">Ver mas</a>
            </div>
          </div>
        </div>
        </section>
    </main>
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