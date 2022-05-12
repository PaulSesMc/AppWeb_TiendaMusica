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
                <a class="nav-link" href="index.php">Inicio</a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="discos.html">Discos
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viniles.html">Viniles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="accesorios.html">Accesorios</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>sixteen products</h2>
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
                  $query="SELECT * FROM productos WHERE tipo='Disco';";
                  $result = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($result)){
                    $titulo = $row['titulo'];
                    $tipo = $row['tipo'];
                    $precio = $row['precio'];
                    $genero = $row['genero'];
                    $artista = $row['artista'];
                    $stock = $row['stock'];
                    echo "
                    <div class=\"col-lg-4 col-md-4 all $genero\">
                      <div class=\"product-item\">
                        <a href=\"#\"><img src=\"assets/images/product_01.jpg\" alt=\"\"></a>
                        <div class=\"down-content\">
                          <a href=\"#\"><h4>$titulo</h4></a>
                          <h6>$$precio</h6>
                          <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                          <ul class=\"stars\">
                            <li><i class=\"fa fa-star\"></i></li>
                            <li><i class=\"fa fa-star\"></i></li>
                            <li><i class=\"fa fa-star\"></i></li>
                            <li><i class=\"fa fa-star\"></i></li>
                            <li><i class=\"fa fa-star\"></i></li>
                          </ul>
                          <span>Reviews (12)</span>
                        </div>
                      </div>
                    </div>
                    ";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="carrito">
      <div class="row">
        <div class="col-md-8 cart">
          <div class="title">
            <div class="row">
              <div class="col"><h4><b>Shopping Cart</b></h4></div>
              <div class="col align-self-center text-right text-muted">3 items</div>
            </div>
          </div>    
          <div class="row border-top border-bottom">
            <div class="row main align-items-center">
              <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
              <div class="col">
                <div class="row text-muted">Shirt</div>
                <div class="row">Cotton T-shirt</div>
              </div>
              <div class="col">
                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
              </div>
              <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
            </div>
          </div>
          <div class="row">
            <div class="row main align-items-center">
              <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
              <div class="col">
                <div class="row text-muted">Shirt</div>
                <div class="row">Cotton T-shirt</div>
              </div>
              <div class="col">
                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
              </div>
              <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
            </div>
          </div>
          <div class="row border-top border-bottom">
            <div class="row main align-items-center">
              <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
              <div class="col">
                <div class="row text-muted">Shirt</div>
                <div class="row">Cotton T-shirt</div>
              </div>
              <div class="col">
                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
              </div>
              <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
            </div>
          </div>
          <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
          <div><h5><b>Summary</b></h5></div>
          <hr>
            <div class="row">
              <div class="col" style="padding-left:0;">ITEMS 3</div>
              <div class="col text-right">&euro; 132.00</div>
            </div>
            <form>
              <p>SHIPPING</p>
              <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
              <p>GIVE CODE</p>
              <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
              <div class="col">TOTAL PRICE</div>
              <div class="col text-right">&euro; 137.00</div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>
      </div>
            
    </div>
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
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
