<?php
    if (isset($_SESSION['pegawai'])) {
        session_destroy();
        echo "<script>alert('Anda telah logout');</script>";
        echo "<script>location='login.php';</script>";
    } else {
        
        header("Location: login.php");
        exit();
    }
?>
