<?php
require("../config.php");

if (isset($_POST['tipe'])) {
	$post_sid = mysqli_real_escape_string($db, $_POST['tipe']);
	$check_service = mysqli_query($db, "SELECT * FROM services WHERE code = '$post_sid'");
	if (mysqli_num_rows($check_service) == 1) {
		$data_service = mysqli_fetch_assoc($check_service);
	?>
	<div class="mb-3">
	<label for="total" class="form-label">Ruangan</label><br>
	<img src="<?php echo $data_service['gambar']; ?>"><br>
	</div>

	<div class="mb-3">
	<label for="total" class="form-label">Harga Kamar</label>    
	<input class="form-control" value="<?php echo $data_service['price']; ?>" readonly>
	</div>

	<?php
	} else {
	?>
					
    <label for="total" class="form-label">Harga Kamar</label>                
    <input class="form-control" value="gagal menampilkan harga" readonly><br>
                    
<?php
	}
} else {
?>
					
    <label for="total" class="form-label">Harga Kamar</label>                
	<input type="number" class="form-control" value="gagal menampilkan harga.." readonly><br>
                    
<?php
}