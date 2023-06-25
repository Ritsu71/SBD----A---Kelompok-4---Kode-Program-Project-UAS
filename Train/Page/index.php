<?php

// Start the session
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

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <title>Liceria Boutique</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="icon" type="image/x-icon" href="vendor/favicon.ico" />
    <style>
        .banner {
            position: relative;
        }

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

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner">
        <img src="vendor/your-image.png" alt="Banner Image">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="caption">

                        <h2>Temukan Dunia Fashion Liceria</h2>
                        <div class="line-dec"></div>
                        <p>
                            Tingkatkan gaya Anda dengan koleksi fashion eksklusif dari Liceria, yang dirancang untuk
                            memberikan kepercayaan diri dan menerima kepribadian unik Anda.
                        </p>
                        <div class="main-button">
                            <a href="checkout.php">Order Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->
    <!-- Featured Starts Here -->
   <?php
$ambil = $koneksi->query("SELECT * FROM produk");
$featuredItems = $ambil->fetch_all(MYSQLI_ASSOC);
$ambil->free_result();
$koneksi->close();
?>

<div class="featured-items">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Featured Items</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($featuredItems as $perproduk) { ?>
                        <a href="beli.php?id=<?php echo $perproduk['id_produk'];
                        ?>">
                            <div class="featured-item">
                                <img src="../foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
                                <h4><?php echo $perproduk['nama_produk']; ?></h4>
                                <h5>Rp <?php echo number_format($perproduk['harga_produk']); ?></h5>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Featred Ends Here -->
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
                <div class="col-md-12">
                    <div class="logo">
                        <img src="assets/images/header-logo.png" alt="" style="max-width: 100px;">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                   
    <!-- Footer Ends Here -->
    <!-- Sub Footer Starts Here -->
       <div class="sub-footer">
         <div class="col-md-12">
              <div class="copyright-text">
              <P>Design : Liceria</p>
              </div>                  
         </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>

</body>

</html>
