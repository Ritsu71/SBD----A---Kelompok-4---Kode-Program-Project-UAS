<?php
session_start();

$koneksi = new mysqli("localhost", "root", "", "boutique2");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
    <link rel="icon" type="image/x-icon" href="vendor/favicon.ico" />
</head>

<body>

    <!-- Pre Header -->


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
    <!-- About Page Starts Here -->
    <div class="about-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1>Keranjang</h1>
                        <hr>
                    </div>
                    <div class="cart-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subharga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $total = 0;

                                // Check if the $_SESSION['keranjang'] array is set and not empty
                                if (isset($_SESSION['keranjang']) && !empty($_SESSION['keranjang'])) {
                                    // Loop through the cart items and display them in the table rows
                                    foreach ($_SESSION['keranjang'] as $id => $quantity) {
                                        // Fetch the product details from the database using the $id
                                        // Replace this part with your actual database query to retrieve product information
                                        $query = "SELECT * FROM produk WHERE id_produk = $id";
                                        $result = $koneksi->query($query);
                                        $row = $result->fetch_assoc();

                                        // Calculate the sub-total for each item
                                        $subTotal = $row['harga_produk'] * $quantity;
                                        $total += $subTotal;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td><?php echo $row['harga_produk']; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td><?php echo $subTotal; ?></td>
                                            <td><img src="../foto_produk/<?php echo $row['foto_produk']; ?>" alt="Product Image" width="100"></td>
                                            <td><a href="hapuskeranjang.php?action=remove&id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Remove</a></td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                } else {
                                   
                                    echo "<tr><td colspan='6'>Keranjang kosong.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <p class="total">Total: <?php echo $total; ?></p>

                      
                        <tr>
                            <td colspan="7" style="text-align: right;">
                                <a href="check.php" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

  

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
                                                value="Your Email..." required="">
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
                            <li><a href="#">Home</a></li>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="social-icons">
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Ends Here -->

    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <p>

                            - Design : Liceria</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Footer Ends Here -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>

</body>

</html>
