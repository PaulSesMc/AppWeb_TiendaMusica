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
              <h4>Agregar Producto</h4>
              <div class="contact-form">
                <form id="contact" action="#" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <fieldset>
                                <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo del Album" required="">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        <fieldset>
                            <select id="tipo" name="tipo" class="form-control">
                                <option value="">--Tipo--</option>
                                <option value="Disco">Disco</option>
                                <option value="Vinil">Vinil</option>
                                <option value="Digital">Digital</option>
                            </select>
                        </fieldset>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <fieldset>
                                <input name="precio" type="number" class="form-control" id="precio" placeholder="Precio" required="">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <fieldset>
                            <select id="genero" name="genero" class="form-control">
                                <option value="">--Genero--</option>
                                <option value="Rock">Rock</option>
                                <option value="Rap">Rap</option>
                                <option value="Pop">Pop</option>
                                <option value="Jazz">Jazz</option>
                            </select>
                        </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="artista" id="" placeholder="Artista">
                            </fieldset>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input name="stock" type="number" class="form-control" id="stock" placeholder="Stock" required="" min="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Portada</label>
                              <input type="file" class="form-control-file" name="portada">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                            <button name="agregar" value="agregar" type="submit" id="form-submit" class="filled-button">Agregar</button>
                        </fieldset>
                        </div>
                    </div>
                </form>
                <?php
                    if (isset($_POST['agregar'])) {
                        $con = mysqli_connect("127.0.0.1","root","","pf");
                        if (mysqli_connect_errno()) {
                          echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }
       
                        $titulo = $_POST['titulo'];
                        $tipo = $_POST['tipo'];
                        $precio = $_POST['precio']; 
                        $genero = $_POST['genero'];
                        $artista = $_POST['artista'];
                        $stock = $_POST['stock'];
      
                        $query="INSERT INTO productos(titulo, tipo, precio, genero, artista, stock) VALUES('$titulo', '$tipo', '$precio', '$genero', '$artista', '$stock');";
                        $r_insertar = mysqli_query($con,$query);
                        if(!$r_insertar){
                            $message = "Error al insertar";
                        }else{
                            $message = "Se agregó correctamente el producto";
                        }
                        echo "<script type='text/javascript'>alert('$message');</script>";

                        $query="SELECT id FROM productos WHERE titulo='$titulo';";
                        $resultado = mysqli_query($con,$query);
                        $row = mysqli_fetch_assoc($resultado);
                        $id = $row["id"];
                        $targetDir = "uploads/";
                        $portada = basename($_FILES["portada"]["name"]);
                        $targetFilePath = $targetDir . $portada;
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                        if(!empty($_FILES["portada"]["name"])){
                          // Allow certain file formats
                          $allowTypes = array('jpg','png','jpeg','gif','pdf');
                          if(in_array($fileType, $allowTypes)){
                              // Upload file to server
                              if(move_uploaded_file($_FILES["portada"]["tmp_name"], $targetFilePath)){
                                  // Insert image file name into database
                                  $query="INSERT INTO imagenes(id_producto, imagen) VALUES ('$id', '".$portada."')";
                                  $insert = mysqli_query($con,$query);
                                  if($insert){
                                      $message = "The file ".$portada. " has been uploaded successfully.";
                                  }else{
                                      $message = "File upload failed, please try again.";
                                  } 
                              }else{
                                  $message = "Sorry, there was an error uploading your file.";
                              }
                          }else{
                            $message = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                          }
                        }else{
                          $message = 'Escoja una portada';
                        }
                        echo "<script type='text/javascript'>alert('$portada');</script>";
                        function subirImagen($archivo, $nombre){
                          
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