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
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sato Zen Records</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>

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
              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="index.php#productos">Productos</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#"><?php echo "$_SESSION[user]" ?>
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading contact-heading header-text">
        <div class="container" id="sesiones">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content" >
                        <div class="contact-form">
                            <?php
                                if (isset($_SESSION['user'])) {
                                    if($_SESSION['permisos']==1){
                                        echo "<h4>Menú Administrador</h4>
                                        <br><h5>Productos</h5><br>
                                        <div class=\"row\">
                                            <div class=\"col-lg-6 col-md-6 col-sm-6\">
                                                <fieldset>
                                                    <a href=\"agregar.php\" class=\"filled-button\">Agregar productos</a>
                                                </fieldset>
                                            </div>
                                            <div class=\"col-lg-6 col-md-6 col-sm-6\">
                                                <fieldset>
                                                    <a href=\"modificar.php\" class=\"filled-button\">Modificar productos</a>
                                                </fieldset>
                                            </div>
                                        </div>";
                                    }

                                }
                            ?>
                            <br><h5>Opciones</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <fieldset>
                                        <a href="c_sesion.php" class="filled-button">Cerrar Sesión</a>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <fieldset>
                                        <a href="compras.php" class="filled-button">Compras</a>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
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
              <p>Copyright &copy; 2020 Sato Zen Records, Ltd.
            
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


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>