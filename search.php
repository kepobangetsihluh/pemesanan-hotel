<?php 
include('config.php');
error_reporting (E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="/app/css/bootstrap.min.css" rel="stylesheet" >
        <title>Digital Talent Scholarship</title>
        
        <link rel="icon" type="image/x-icon" href="https://digitalent.kominfo.go.id/favicon.ico"/>
        <link rel="icon" type="image/png" sizes="32x32" href="https://digitalent.kominfo.go.id/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://digitalent.kominfo.go.id/favicon-16x16.png">
        <link rel="apple-touch-icon" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="57x57" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="72x72" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="76x76" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="114x114" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="120x120" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="144x144" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="152x152" href="https://digitalent.kominfo.go.id/apple-touch-icon.png"/>
        <link rel="apple-touch-icon" sizes="180x180" href="https://digitalent.kominfo.go.id/apple-touch-icon.png">

        <script src="https://use.fontawesome.com/525e64b9a3.js"></script>

    </head>
<body>
    <header class="container bg-primary text-white">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="/app"><img src="/app/images/logo.jpeg" height="50px" alt="Logo OpenDoorz">OpenDoorz</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">  
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link" href="#standar">KAMAR STANDAR</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#deluxe">KAMAR DELUXE</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#family">KAMAR FAMILY</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="https://arzy.me">HUBUNGI KAMI</a>
                        </li>
                      </ul>
                      <form class="d-flex" method="GET" action="/app/search.php">
                        <input class="form-control me-auto" type="search" placeholder="ID Booking" name="cari">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
<main class="container border">
    <div class="row">
        <div class="col-md-8 py-5">
            <h1>OpenDoorz Hotel Sentul City Bogor</h1><br />
            <p style="text-align : justify;">Ideally located as part of Sentul International Convention center, surrounded by the outstanding mountains of Bogor, close to Taman Budaya, Alam Fantasi Park and to Sentul Golf Courses. With the outbound adventures, the hot spring water and the mountains, the hotel with its natural and fresh environment is truly a place for relaxing business and family getaway.<br /><br />

                <img class="img-fluid" src="/app/images/gambar1.jpg" width="700px">

            </p>
        </div>
        <div class="col-md-4 py-5">
 	<?php 
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$cek_data = mysqli_query($db, "select * from orders where booking_id = '$cari' LIMIT 1");

			if (mysqli_num_rows($cek_data) == 0) {
				$msg_type = "error";
				$msg_content = "GAGAL !! KODE BOOKING TIDAK DITEMUKAN";
			} else {
		}
	}

	while($d = mysqli_fetch_array($cek_data)){
	?>
            <form method="POST">
                <div class="mb-3"> 
                    <h3>DETAIL BOOKING</h3>
                </div><br>
                            
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $d['name']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">No Identitas</label>
                        <input type="number" class="form-control" id="nik" value="<?php echo $d['nik']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe Kamar</label>
                        <input type="text" class="form-control"	id="tipe" value="<?php echo $d['tipe']; ?>" readonly>
                    </div>
                    <div id="harga"></div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" id="date" value="<?php echo $d['date']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi Menginap</label>
                        <input type="number" class="form-control" id="durasi" value="<?php echo $d['durasi']; ?>" readonly>
                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="sarapan">Termasuk Breakfast</label>
                        <input type="checkbox" class="form-check-input" id="sarapan" <?php if ($d['sarapan'] == "Ya") { ?> checked  <?php } else { ?> <?php } ?>>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Bayar</label>
                        <input type="number" class="form-control" id="total" value="<?php echo $d['total']; ?>" readonly>
                    </div>
                    
                <a class="btn btn-outline-danger" onclick="location.href='/app';">HALAMAN UTAMA</a>

            </form>
				<?php 
            	} 
            	?>
            								<?php 
											if ($msg_type == "error") {
											?>
<div class='alert alert-danger' role='alert'>
  <h4 class='alert-heading'>Something Wrong!</h4>
  <p>uppss, ada yang salah dengan kode booking anda !! periksa kembali apakah kode booking anda sudah benar.</p>
  <hr>
  <p class='mb-0'>hubungi kami jika anda mengalami kesulitan, <a href='/app' class='btn btn-outline-primary'>BOOKING NOW HERE !!</a></p>
</div>              
											<?php
											} 
											?>
											
        </div>
     </div>
</main>
<footer class="container bg-white text-black">
    <div class="row">
        <div class="col-12 py-4">
      <center>
          <p> OpenDoorz Hotel Sentul City <br><br>

&copy; 2021 | All Rights Reserved created with <i class="fa fa-heart" aria-hidden="true"></i> by <a style="text-decorations:none; color:inherit;" href="https://arzy.me">arzy.me</a> <br><br>

Kompleks SICC, Jl. Jendral Sudirman No 1, Sentul City, Bogor - Indonesia 16810</p>
      </center>  
        </div>
    </div>
</footer>
<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>

<?

?>