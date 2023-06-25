<?php
session_start();
if (!isset($_SESSION['pegawai'])) {
    echo "<script>alert('Anda belum login, silahkan login terlebih dahulu.'); window.location.href = 'login.php';</script>";
    exit();
}

$koneksi = new mysqli("localhost", "root", "", "boutique2");
if (!isset($_SESSION['pegawai'])) {
    echo '<div style="color: red; text-align: center; font-size: 18px;">You are not logged in. Please login to access this page.</div>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Butik Liceria</title>
    <!-- BOOTSTRAP STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES -->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES -->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- LINK TO FONTAWESOME -->
    <link rel="Stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <style>
        .navbar {
            background-color: #ff534f; 
            border-color: #333; 
            min-height: 60px; 
            margin-bottom: 0; 
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                Last access: <?php echo date('d F Y'); ?> &nbsp;
            </div>
        </nav>
        <!-- /. NAV TOP -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.jpg" class="user-image img-responsive" />
                    </li>
                    <li> <a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li> <a href="index.php?halaman=pelanggan"><i class="fas fa-user"></i> Pelanggan</a></li>
                    <li> <a href="index.php?halaman=produk"><i class="fas fa-tshirt"></i> Produk</a></li>
                    <li> <a href="index.php?halaman=pembelian"><i class="fas fa-shopping-cart"></i> Pembelian</a></li>               
                    <li> <a href="index.php?halaman=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    } elseif ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    } elseif ($_GET['halaman'] == "pelanggan") {
                        include 'pelanggan.php';
                    } elseif ($_GET['halaman'] == "detail") {
                        include 'detail.php';
                    } elseif ($_GET['halaman'] == "tambahproduk") {
                        include 'tambahproduk.php';
                    } elseif ($_GET['halaman'] == "hapusproduk") {
                        include 'hapusproduk.php';
                    } elseif ($_GET['halaman'] == "ubahproduk") {
                        include 'ubahproduk.php';
                    } elseif ($_GET['halaman'] == "tambahpelanggan") {
                        include 'tambahpelanggan.php';
                    } elseif ($_GET['halaman'] == "ubahpelanggan") {
                        include 'ubahpelanggan.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    }
                } else {
                    include 'home.php';
                }
                ?>
            </div>
            <!-- /. PAGE INNER -->
        </div>
        <!-- /. PAGE WRAPPER -->
    </div>
    <!-- /. WRAPPER -->
    <!-- SCRIPTS -AT THE BOTTOM TO REDUCE THE LOAD TIME -->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
