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
                <a class="nav-link" href="#productos">Productos</a>
              </li>
              <?php
                if (isset($_SESSION["user"])) {
                  $nombre = $_SESSION["user"];
                  echo "<li class=\"nav-item active\">
                          <a class=\"nav-link\" href=\"usuario.php\">$_SESSION[user]
                          <span class=\"sr-only\">(current)</span></a>
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
                  if(isset($_POST['eliminar'])){
                    $producto = $_POST['eliminar'];
                    $query="DELETE FROM productos WHERE id=$producto;";
                    $result = mysqli_query($con,$query);
                    if(!$result){
                        $message = "Error al borrar";
                    }else{
                        $message = "Se eliminó correctamente el producto";
                    }
                    echo "<script type='text/javascript'>alert('$message');</script>";
                  }
      
                  $query="SELECT * FROM productos;";
                  $productos = mysqli_query($con,$query);

                  echo "<table class=\"table table-sm\">";
                  echo "<thead class=\"thead-dark\">
                          <tr>
                            <th scope=\"col\" class=\"izq\">Titulo</th>
                            <th scope=\"col\" class=\"izq\">Artista</th>
                            <th scope=\"col\">Precio</th>
                            <th scope=\"col\">Genero</th>
                            <th scope=\"col\">Tipo</th>
                            <th scope=\"col\">Stock</th>
                            <th scope=\"col\">Eliminar</th>
                            <th scope=\"col\">Modificar</th>
                          </tr>
                        </thead>";
                  while($row = mysqli_fetch_array($productos)) {
                    $titulo = $row['titulo'];
                    $artista  = $row['artista'];
                    $precio  = $row['precio'];
                    $genero  = $row['genero'];
                    $tipo  = $row['tipo'];
                    $stock = $row['stock'];
                    $id = $row['id'];
    
                    echo "<tr><td class=\"izq\">$titulo</td><td class=\"izq\">$artista</td><td>$precio</td><td>$genero</td><td>$tipo</td><td>$stock</td>
                    <td><form method=\"POST\"><button name=\"eliminar\" value=\"$id\" type=\"submit\" class=\"eliminar\">Eliminar</button></form></td>
                    <td><form method=\"POST\" action=\"mod_prod.php\"><button name=\"modificar\" value=\"$id\" type=\"submit\" class=\"modificar\">Modificar</button></td></form></tr>";
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