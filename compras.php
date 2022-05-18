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
                <a class="nav-link" href="usuario.php"><?php echo "$_SESSION[user]" ?>
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
              <h4>Productos</h4>
              <div class="table-responsive">
                <?php
                  $con = mysqli_connect("127.0.0.1","root","","pf");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  if($_SESSION['permisos']==1){
                    $query="SELECT * FROM compras c JOIN productos p ON c.producto=p.id;";
                    echo "<h5>Todas las compras</h5>";
                  }else{
                    $usuario = $_SESSION['user_id'];
                    $query="SELECT * FROM compras c JOIN productos p ON c.producto=p.id WHERE c.usuario=$usuario;";
                    echo "<h5>Historial de compras</h5>";
                  }
                  $compras = mysqli_query($con,$query);

                  echo "<table class=\"table table-sm\">";
                  echo "<thead class=\"thead-dark\">
                          <tr>
                            <th scope=\"col\" class=\"izq\">Titulo</th>
                            <th scope=\"col\">Precio</th>
                          </tr>
                        </thead>";
                  while($row = mysqli_fetch_array($compras)) {
                    $titulo = $row['titulo'];
                    $precio  = $row['precio'];
    
                    echo "<tr><td class=\"izq\">$titulo</td><td>$precio</td></tr>";
                  }
                  echo "</table>";
                  
                  
                ?>
              </div>
              <a href="usuario.php" class="filled-button">Regresar</a>
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


    <script type = "text/Javascript"> 
      function borrar(id){
        var result ="<?php borrar($id); ?>"
      }
    </script>

    <?php
      
    ?>


  </body>

</html>