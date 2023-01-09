<?php
require("../config.php");

if (isset($_POST['tipe'])) {
	$post_sid = mysqli_real_escape_string($db, $_POST['tipe']);
	$check_service = mysqli_query($db, "SELECT * FROM services WHERE code = '$post_sid'");
	if (mysqli_num_rows($check_service) == 1) {
		$data_service = mysqli_fetch_assoc($check_service);
		$result = $data_service['price'] / 1;
		echo $result;
	} else {
		die("0");
	}
} else {
	die("0");
}