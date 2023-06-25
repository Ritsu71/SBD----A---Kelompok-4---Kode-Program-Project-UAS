<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control">
    </div>

    <div class="form-group">
        <label>Harga Rp</label>
        <input type="number" class="form-control" name="harga">
    </div>

    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10"></textarea>
    </div>

    <button class="btn btn-primary" name="tambah">Tambah</button>
</form>

<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

    $koneksi->query("INSERT INTO produk (nama_produk, harga_produk, deskripsi_produk, foto_produk) 
                    VALUES ('$nama', '$harga', '$deskripsi', '$namafoto')");

    echo "<script>alert('Data produk telah ditambahkan');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>
