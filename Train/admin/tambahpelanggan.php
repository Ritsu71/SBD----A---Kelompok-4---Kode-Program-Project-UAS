<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="tel" class="form-control" name="telepon">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	
	// Validate the inputs (you can add more validation if needed)
	if (empty($nama) || empty($email) || empty($telepon)) {
		echo "<div class='alert alert-danger'>Harap lengkapi semua field</div>";
	} else {
		// Save the data to the database
		$koneksi = new mysqli('localhost', 'root', '', 'boutique2');

		if ($koneksi->connect_error) {
			die("Connection failed: " . $koneksi->connect_error);
		}

		$koneksi->query("INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, telepon_pelanggan)
			VALUES ('$nama', '$email', '$telepon')");

		echo "<div class='alert alert-info'>Data tersimpan</div>";
		header("refresh:1;url=index.php?halaman=pelanggan");
	}
}
?>