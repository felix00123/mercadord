  
        <?php
function categoriasw () 
{
?>
  <!--Menu de las categorias-->
    <div class="pos-f-t" id="divCategorias">
                <!--Menu de la barra de busqueda y el boton desplegable-->
        <nav class="navbar navbar-light bg-white shadow-sm menu-ct">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span>Categorias</span>
          </button>
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mostrar por
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Mas recientes</a>
                <a class="dropdown-item" href="#">Precios altos</a>
                <a class="dropdown-item" href="#">Precios bajos</a>
                <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Provincias</a>
            </div>
        </div>
        </nav>
        <!--Las categorias-->
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-white p-4 shadow-sm">
            <!--Titulo de las categorias-->
            <h5>Todas las categorias</h5>
            <dir class="divisor"></dir>
            <!--Contenedor de las categorias-->
            <div class="container contenedorCt">
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <ul class="lista1 list-group list-group-flush">
                    <li class="list-group-item"><a href="#"><i class="fas fa-couch"></i> Hogar</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-car"></i> Vehículo</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-baby"></i> Bebes y niños</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-skating"></i> Deporte</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-microchip"></i> Electronica</a></li>
                  </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <ul class="lista2 list-group list-group-flush">
                    <li class="list-group-item"><a href="#"><i class="fas fa-tshirt"></i> Moda y belleza</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-mobile-alt"></i> teléfonos celulares y accesorios</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-laptop"></i> Computadoras y accesorios</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-home"></i> Inmuebles en venta y alquiler</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-align-center"></i> Otros</a></li>
                  </ul>
                </div>
              </div>
            </div>        
          </div>
        </div>
      </div>

    </header>
  <?php
}
?>