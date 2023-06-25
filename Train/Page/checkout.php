<?php
session_start();

if (isset($_SESSION['success_message'])) {
    echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';

    // Unset the session variable to remove the message
    unset($_SESSION['success_message']);
}

$koneksi = new mysqli("localhost", "root", "", "boutique2");
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Fetch product data from the database
$query = "SELECT * FROM produk";
$result = $koneksi->query($query);

// Check if the query executed successfully
if (!$result) {
    die("Query execution failed: " . $koneksi->error);
}

// Store the fetched product data in an array
$featuredItems = array();
while ($row = $result->fetch_assoc()) {
    $featuredItems[] = $row;
}
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pixie - Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="icon" type="image/x-icon" href="vendor/favicon.ico" />

    <style>
     .banner img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Other image styles */
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>

  </head>

  <body>
    
   
    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                        </a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="checkout.php">Product</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    
    <div class="featured-page">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <div class="section-heading">
          <div class="line-dec"></div>
          <h1>Featured Items</h1>
        </div>
      </div>
      <div class="col-md-8 col-sm-12">
        <div id="filters" class="button-group">
          <button class="btn btn-primary" data-filter="*">All Products</button>
          <button class="btn btn-primary" data-filter=".new">Newest</button>
          <button class="btn btn-primary" data-filter=".low">Low Price</button>
          <button class="btn btn-primary" data-filter=".high">High Price</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <?php foreach ($featuredItems as $perproduk) { ?>
      <div class="col-md-3 col-sm-6">
        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>">
          <div class="featured-item">
            <img src="../foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
            <h4><?php echo $perproduk['nama_produk']; ?></h4>
            <h5>Rp <?php echo number_format($perproduk['harga_produk']); ?></h5>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>

<div class="page-navigation">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li class="current-page"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

    <!-- Featred Page Ends Here -->


    <!-- Subscribe Form Starts Here -->
     <div class="subscribe-form">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1>Subscribe ke Liceria Sekarang!</h1>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="main-content">
                        <p>Tetap terhubung dan menjadi yang pertama mengetahui tentang pembaruan dan penawaran terbaru
                            kami.</p>
                        <div class="container">
                            <form id="subscribe" action="" method="get">
                                <div class="row">
                                    <div class="col-md-7">
                                        <fieldset>
                                            <input name="email" type="text" class="form-control" id="email"
                                                onfocus="if(this.value == 'Your Email...') { this.value = ''; }"
                                                onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                                                value="Your Email...">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-5">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="button" disabled>Subscribe Sekarang!</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe Form Ends Here -->


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/header-logo.png" alt="" style="max-width: 100px;">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
             <li><a href="index.php">Home</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
         <div class="col-md-12">
              <div class="copyright-text">
              <P>Design : Liceria</p>
              </div>                  
         </div>
    <!-- Sub Footer Ends Here -->


    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


   
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>


   


  </body>

</html>