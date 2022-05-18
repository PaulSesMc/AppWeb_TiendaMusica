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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
          <a class="navbar-brand" href="index.php"><h2>Zato Sen <em>Records</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto"> 
              <li class="nav-item">
                <a class="nav-link" href="discos.php">Discos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viniles.php">Viniles</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="accesorios.html">Digitales
                <span class="sr-only">(current)</span>
                </a>
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
                }else {
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
    <div class="page-heading digitales-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Todo es</h4>
              <h2>Digital</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".Rock">Rock</li>
                  <li data-filter=".Rap">Rap</li>
                  <li data-filter=".Pop">Pop</li>
                  <li data-filter=".Jazz">Jazz</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
              <div class="row grid">
                <?php
                  $con = mysqli_connect("127.0.0.1","root","","pf");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $query="SELECT * FROM productos WHERE tipo='Digital';";
                  $result = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($result)){
                    $titulo = $row['titulo'];
                    $tipo = $row['tipo'];
                    $precio = $row['precio'];
                    $genero = $row['genero'];
                    $artista = $row['artista'];
                    $stock = $row['stock'];
                    $id = $row['id'];
                    $query="SELECT * FROM imagenes WHERE id_producto=$id;";
                    $resultado = mysqli_query($con,$query);
                    $fila = mysqli_fetch_array($resultado);
                    $imagen = 'uploads/'.$fila['imagen'];
                    echo "
                    <div class=\"col-lg-4 col-md-4 all $genero\">
                      <div class=\"product-item\">
                        <a href=\"#\"><img src=\"$imagen\" alt=\"\"></a>
                        <div class=\"down-content\">
                          <a href=\"#\"><h4>$titulo</h4></a>
                          <br><h6>$$precio</h6>
                          <p>$artista</p>
                          <form method=\"post\">
                            <div class=\"cart-action\"><button name=\"carrito\" value=\"$id\" type=\"submit\" class=\"carrito\">Agregar al carrito</button></div>
                          </form>
                        </div>
                      </div>
                    </div>
                    ";
                  }
                  if(isset($_POST['carrito'])){
                    if(isset($_SESSION["user"])){
                      $producto = $_POST['carrito'];
                      $usuario = $_SESSION['user_id'];
                      $query="INSERT INTO carrito(usuario, producto) VALUES('$usuario', '$producto');";
                      $r_insertar = mysqli_query($con,$query);
                      if(!$r_insertar){
                          $message = "Error al insertar";
                      }else{
                          $message = "Se agregó correctamente el producto";
                      }
                    }else{
                      echo "<script type='text/javascript'>alert('Inicie sesión para poder comprar');</script>";
                    }
                  }
                ?>
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
