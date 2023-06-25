<h2>Ubah Pelanggan</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post">
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" value="<?php echo $pecah['email_pelanggan']; ?>">
	</div>
	
	<div class="form-group">
		<label>Password</label>
		<input type="<?php echo isset($_GET['show_password']) ? 'text' : 'password'; ?>" class="form-control" name="password" value="<?php echo $pecah['password_pelanggan']; ?>">
	</div>
	
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" class="form-control" name="telepon" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>

	<div class="form-check">
		<input class="form-check-input" type="checkbox" name="show_password" id="show_password" <?php echo isset($_GET['show_password']) ? 'checked' : ''; ?>>
		<label class="form-check-label" for="show_password">
			Tampilkan Password
		</label>
	</div>
	
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
	$koneksi->query("UPDATE pelanggan SET
		nama_pelanggan = '$_POST[nama]',
		email_pelanggan = '$_POST[email]',
		password_pelanggan = '$_POST[password]',
		telepon_pelanggan = '$_POST[telepon]'
		WHERE id_pelanggan = '$_GET[id]'
	");

	echo "<script>alert('Data pelanggan telah diubah');</script>";
	echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>
