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
              <?php
                if (isset($_SESSION["user"])) {
                  $nombre = $_SESSION["user"];
                  echo "<li class=\"nav-item active\">
                          <a class=\"nav-link\" href=\"#\">Carrito
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
                <h4>Carrito</h4>
                    <div class="table-responsive">
                        <?php
                        $con = mysqli_connect("127.0.0.1","root","","pf");
                        if (mysqli_connect_errno()) {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
                        if(isset($_POST['eliminar'])){
                            $producto = $_POST['eliminar'];
                            $query="DELETE FROM carrito WHERE producto=$producto LIMIT 1;";
                            $result = mysqli_query($con,$query);
                            if(!$result){
                                $message = "Error al borrar";
                            }else{
                                $message = "Se eliminó correctamente el producto";
                            }
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        $total = 0;
                        $usuario = $_SESSION['user_id'];
                        $query="SELECT * FROM carrito c JOIN productos p ON c.producto = p.id WHERE c.usuario=$usuario;";
                        $productos = mysqli_query($con,$query);

                        if(isset($_POST['comprar'])){
                            while($row = mysqli_fetch_array($productos)) {
                                $id_producto = $row['id'];
                                $titulo = $row['titulo'];
                                $stock = $row['stock'];
                                $stock = $stock - 1;
                                if($stock<0){
                                    echo "<script type='text/javascript'>alert('no hay stock de $titulo');</script>";
                                }else{
                                    $query="INSERT INTO compras(usuario, producto) VALUES('$usuario', '$id_producto');";
                                    $r_insertar = mysqli_query($con,$query);
                                    $update = "UPDATE productos SET `stock` = '$stock' WHERE id = $id_producto;";
                                    $r_update = mysqli_query($con,$update);
                                }
                            }
                            $query="DELETE FROM carrito WHERE usuario=$usuario;";
                            $result = mysqli_query($con,$query);
                            header("Location: compras.php", TRUE, 301);
                            exit();
                        }

                        echo "<table class=\"table table-sm\">";
                        echo "<thead class=\"thead-dark\">
                                <tr>
                                    <th scope=\"col\" class=\"izq\">Titulo</th>
                                    <th scope=\"col\" class=\"izq\">Artista</th>
                                    <th scope=\"col\">Precio</th>
                                    <th scope=\"col\">Tipo</th>
                                    <th scope=\"col\">Eliminar</th>
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
                            $total = $total + $precio;
            
                            echo "<tr><td class=\"izq\">$titulo</td><td class=\"izq\">$artista</td><td>$precio</td><td>$tipo</td>
                            <td><form method=\"POST\"><button name=\"eliminar\" value=\"$id\" type=\"submit\" class=\"eliminar\">Eliminar</button></form></td></tr>";
                        }
                        echo "</table>";                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo "<h5>TOTAL : $total</h5>"?>
        <div class="row">
            <div class="col-md-6">
                <a href="discos.php" class="btn btn-secondary">Regresar</a>            
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Comprar
                </button>                
            </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Carrito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Proceder con la compra por un total de: <?php echo "$total";?> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form method="POST"><button name="comprar" value="" type="submit" class="carrito">Comprar</button></form>
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