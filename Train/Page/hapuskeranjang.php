<?php
session_start();

if(isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])){
    $id_produk = $_GET['id'];

    if(isset($_SESSION['keranjang'][$id_produk])){
        // Decrease the quantity of the item by 1
        $_SESSION['keranjang'][$id_produk] -= 1;

        // If the quantity becomes 0 or less, remove the item from the cart
        if($_SESSION['keranjang'][$id_produk] <= 0){
            unset($_SESSION['keranjang'][$id_produk]);
        }

    }
}

// Redirect back to the referring page
if(isset($_SERVER['HTTP_REFERER'])){
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
