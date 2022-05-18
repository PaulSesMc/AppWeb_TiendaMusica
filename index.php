<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sato Zen Records</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Sato Zen <em>Records</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#productos">Productos</a>
              </li>
              <?php
                if (isset($_SESSION["user"])) {
                  $nombre = $_SESSION["user"];
                  echo "<li class=\"nav-item\">
                          <a class=\"nav-link\" href=\"usuario.php\">$_SESSION[user]</a>
                        </li>
                        <li class=\"nav-item\">
                          <a class=\"nav-link\" href=\"carrito.php\">Carrito</a>
                        </li>";
                } else {
                  echo "<li class=\"nav-item\">
                          <a class=\"nav-link\" href=\"sesion.php\">Iniciar Sesión</a>
                        </li>";
                }
                
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Denzel Curry</h4>
            <h2>MELT MY EYEZ  SEE YOUR FUTURE</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div id="productos" class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>PRODUCTOS</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="discos.php"><img src="assets/images/fondo1.gif" alt="disco girando"></a>
              <div class="down-content">
                <a href="./discos.php"><h4>CDs</h4></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="viniles.php"><img src="assets/images/vinil.gif" alt="vinil girando"></a>
              <div class="down-content">
                <a href="viniles.php"><h4>Viniles</h4></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="digitales.php"><img src="assets/images/accesorios.gif" alt="audifonos"></a>
              <div class="down-content">
                <a href="digitales.php"><h4>Digitales</h4></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Sobre Nosotros</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Buscas un lugar para comprar música?</h4>
              <p>Sato Zen Records es una tienda virtual y física en donde encontraras lo mejor de la música, desde nuevos estrenos comerciales, hasta albumes que no encontrarás en otro lado. 
                 En Sato Zen Records lo que buscamos es que seas dueño de la música que quieres. Para lograr esto manejamos los siguientes formatos
              </p>
              <ul class="featured-list">
                <li><a href="#">Discos</a></li>
                <li><a href="#">Viniles</a></li>
                <li><a href="#">Albumes digitales</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/nosotros.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2022 Sato Zen Records Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

</html>