<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
include('config.php');

    if (isset($_POST['pesan'])) {  
        $post_name = $_POST['name'];
        $post_gender = $_POST['gender'];
        $post_nik = $_POST['nik'];
        $post_tipe = $_POST['tipe'];
        $post_date = $_POST['date'];
        $post_durasi = $_POST['durasi'];
        $post_sarapan = $_POST['sarapan'];
        

        $check_service = mysqli_query($db, "SELECT * FROM services WHERE code = '$post_tipe'");
        $data_service = mysqli_fetch_assoc($check_service);
        $rate = ($data_service['price'] / 1) * $post_durasi;
        $validasi_nik = '16';

        if (empty($post_name) || empty($post_gender) || empty($post_nik) || empty($post_tipe) || empty($post_date) || empty($post_durasi)) {
            $msg_type = "error";
            $msg_content = "Harap isi semua bidang";
        } else if (strlen($post_nik) < $validasi_nik) {
            $msg_type = "error";
            $msg_content = "No Identitas Minimal 16 angka";
        } else if (strlen($post_nik) > $validasi_nik) {
            $msg_type = "error";
            $msg_content = "No Identitas Maksimal 16 angka";
        } else {
        
        if ($post_durasi >= 3) {
            $diskon = (10/100) * $rate;
            $rate = $rate - $diskon;
        } else {
            $rate = $rate;
        }


        if (!empty($_POST['sarapan'])) {
            $post_sarapan = 'Ya';
            $rate = $rate + 80000;
        } else {
            $post_sarapan = 'Tidak';
            $rate = $rate;
        }

        $booking_id =  mt_rand(100000,999999);
    
        $insert_order = mysqli_query($db, "INSERT INTO orders (booking_id, name, gender, nik, tipe, date, durasi, sarapan, total) VALUES ('$booking_id','$post_name', '$post_gender', '$post_nik', '$post_tipe', '$post_date', '$post_durasi', '$post_sarapan', '$rate')");

        if ($insert_order == true) { 
            $msg_type = "success";
            $msg_content = "<B>BOOKING BERHASIL !<br /> DETAIL PEMESANAN</B> <BR /><BR> ID BOOKING : $booking_id<BR> NAMA PEMESAN : $post_name <br />KLIK TOMBOL SEARCH UNTUK MELIHAT DETAIL BOOKING ANDA.<BR /><br /> SILAHKAN CHECK IN MULAI DARI PUKUL 14:00 !!";
        } else {
            $msg_type = "error";
            $msg_content = "BOOKING GAGAL !";
        }
    }
}
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
            <p style="text-align : justify;">Ideally located as part of Sentul International Convention center, surrounded by the outstanding mountains of Bogor, close to Taman Budaya, Alam Fantasi Park and to Sentul Golf Courses. With the outbound adventures, the hot spring water and the mountains, the hotel with its natural and fresh environment is truly a place for relaxing business and family getaway.<br /><br /></p>

                <center><iframe width="560" height="315" src="https://www.youtube.com/embed/G0M1Z3_-Zvk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center><BR /><BR />

                <img class="img-fluid" src="/app/images/gambar1.jpg" width="700px"><BR /><BR /><BR /><BR />


            <h3>KAMAR STANDAR</h3><BR />
                <img class="img-fluid" src="/app/images/kamar1.jpg" width="700px"><BR /><BR />

<dl class="row">
  <dt class="col-sm-3">Deskripsi</dt>
  <dd class="col-sm-9" style="text-align:justify">Check-in and Check-out Time<br>
Check-in: Dari 14:00<br>
Check-out: Sebelum 12:00<br><br>
Resepsionis siap 24 jam untuk melayani proses check-in, check-out dan kebutuhan Anda yang lain. Jangan ragu untuk menghubungi resepsionis, kami siap melayani Anda. WiFi tersedia di seluruh area publik properti untuk membantu Anda tetap terhubung dengan keluarga dan teman. Pelayanan yang baik dengan harga terjangkau akan membuat Anda merasa nyaman.</dd>

  <dt class="col-sm-3">Fasilitas</dt>
  <dd class="col-sm-9">
    <ul>
        <li>AC</li>
        <li>TV LCD channel lokal</li>
        <li>bathtub dan air panas</li>
        <li>balkon</li>
        <li>akses Wi-Fi gratis</li>
        <li>meja rias</li>
        <li>view kebun</li>
        <li>bed/twin bed</li>
    </ul>
  </dd>

  <dt class="col-sm-3">Kapasitas Kamar</dt>
  <dd class="col-sm-9">2 Orang Dewasa.</dd>

  <dt class="col-sm-3">Harga / Malam</dt>
  <dd class="col-sm-9">
    <dl class="row">
      <dt class="col-sm-4">IDR 500.000</dt>
    </dl>
  </dd>
</dl>


            <h3 id="#deluxe">KAMAR DELUXE</h3><BR />
                <img class="img-fluid" src="/app/images/kamar2.jpg" width="700px"><BR /><BR />

<dl class="row">
  <dt class="col-sm-3">Deskripsi</dt>
  <dd class="col-sm-9" style="text-align:justify">Berdasarkan ketersediaan Termasuk Sarapan untuk 1 hingga 2 Orang Gedung Barat - Kamar Bebas-Rokok 26M², Kamar Mandi dengan Shower saja Gedung Timur - Kamar Merokok 26 M², Kamar Mandi dengan Bathtub dan Pancuran Penjemputan di bandara dikenakan biaya Rp 650.000 (sekali jalan).</dd>

  <dt class="col-sm-3">Fasilitas</dt>
  <dd class="col-sm-9">
    <ul>
        <li>AC</li>
        <li>TV LCD channel lokal</li>
        <li>bathtub dan air panas</li>
        <li>DVD player</li>
        <li>kulkas</li>
        <li>minibar</li>
        <li>balkon</li>
        <li>akses Wi-Fi gratis</li>
        <li>meja rias</li>
        <li>view kebun</li>
        <li>room maid</li>
        <li>bed/twin bed</li>
    </ul>
  </dd>

  <dt class="col-sm-3">Kapasitas Kamar</dt>
  <dd class="col-sm-9">2 Orang Dewasa.</dd>

  <dt class="col-sm-3">Harga / Malam</dt>
  <dd class="col-sm-9">
    <dl class="row">
      <dt class="col-sm-4">IDR 750.000</dt>
    </dl>
  </dd>
</dl>



            <h3>KAMAR FAMILY</h3><BR />
                <img class="img-fluid" src="/app/images/kamar3.jpg" width="700px"><BR /><BR />
<dl class="row">
  <dt class="col-sm-3">Deskripsi</dt>
  <dd class="col-sm-9" style="text-align:justify">Karena situasi Coronavirus (COVID-19), fasilitas umum dan area tertentu mungkin ditutup sesuai dengan arahan pemerintah Hiburan-Televisi LCD dengan channel kabel, Wi-Fi gratis Makan Minum-Pembuat kopi/teh, minibar, layanan kamar 24 jam, dan air minum kemasan gratis Kamar Mandi-Kamar mandi pribadi, sandal, dan perlengkapan mandi gratis Meja Praktis, Brankas Elektronik, dan telepon Comfort-AC dan tata graha harian.</dd>

  <dt class="col-sm-3">Fasilitas</dt>
  <dd class="col-sm-9">
    <ul>
        <li>AC</li>
        <li>TV LCD channel lokal</li>
        <li>bathtub dan air panas</li>
        <li>Complimentary bottled water</li>
        <li>DVD player</li>
        <li>kulkas</li>
        <li>minibar</li>
        <li>balkon</li>
        <li>akses Wi-Fi gratis</li>
        <li>meja rias</li>
        <li>view kebun</li>
        <li>room maid</li>
        <li>bed/twin bed</li>
    </ul>
  </dd>

  <dt class="col-sm-3">Kapasitas Kamar</dt>
  <dd class="col-sm-9">4 Orang Dewasa.</dd>

  <dt class="col-sm-3">Harga / Malam</dt>
  <dd class="col-sm-9">
    <dl class="row">
      <dt class="col-sm-4">IDR 1.000.000</dt>
    </dl>
  </dd>
</dl>


        </div>
        <div class="col-md-4 py-5">
            <form method="POST">
                <div class="mb-3"> 
                    <h3>Booking Order</h3>
                </div><br>
                            <?php 
                                if ($msg_type == "success")   {
                            ?>
                                <div class="alert alert-success">
                                    <?php echo $msg_content; ?><br />
                                </div>
                            <?php
                                } else if ($msg_type == "error") {
                            ?>
                                <div class="alert alert-danger">
                                    <?php echo $msg_content; ?>
                                </div>
                            <?php
                                }
                            ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Laki-laki" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" value="Laki-laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Perempuan" id="flexRadioDefault2" value="Perempuan">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">No Identitas</label>
                        <input type="number" class="form-control" id="nik" name="nik">
                    </div>
                    <div class="mb-3">
                        <label for="tipe" class="form-label">Tipe Kamar</label>
                        <select class="form-select" aria-label="Default select example" id="tipe" name="tipe">
                            <option value="0">SELECT ONE</option>
                            <?php
                                $check_cat = mysqli_query($db, "SELECT * FROM cat ORDER BY id ASC");
                                while ($data_cat = mysqli_fetch_assoc($check_cat)) {
                            ?>
                            <option value="<?php echo $data_cat['code']; ?>"><?php echo $data_cat['name']; ?></option>
                            <?php
                                }
                            ?>  
                        </select>
                    </div>
                    <div id="harga"></div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi Menginap</label>
                        <input type="number" class="form-control" id="durasi" name="durasi" onkeyup="get_total(this.value).value;">
                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label" for="sarapan">Termasuk Breakfast</label>
                        <input type="checkbox" class="form-check-input" id="sarapan" name="sarapan">
                    </div>
                    <input type="hidden" id="rate" value="0">
                    <div class="mb-3">
                        <label for="total" class="form-label">Total Bayar</label>
                        <input type="number" class="form-control" id="total" readonly>
                    </div>
                    
                <button type="submit" class="btn btn-outline-success" name="pesan">BUAT PESANAN</button>
                <button type="buttom" class="btn btn-outline-danger" id="clear" onclick="location.href = '?'">CLEAR</button>
            </form>
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

            <!--basic scripts-->
    <script src="app/vendor/jquery/jquery.min.js"></script>
    <script src="app/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="app/vendor/popper.min.js"></script>
    <script src="app/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="app/vendor/jquery.dcjqaccordion.2.7.js"></script>
    <script src="app/vendor/icheck/skins/icheck.min.js"></script>





<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    $("#tipe").change(function() {
        var tipe = $("#tipe").val();
        $.ajax({
            url: '/app/inc/harga.php',
            data: 'tipe=' + tipe,
            type: 'POST',
            dataType: 'html',
            success: function(msg) {
                $("#harga").html(msg);
            }
        });
        $.ajax({
            url: '/app/inc/rate.php',
            data: 'tipe=' + tipe,
            type: 'POST',
            dataType: 'html',
            success: function(msg) {
                $("#rate").val(msg);
            }
        });
        
    });
});

function get_total(durasi) {
    var rate = $("#rate").val();
    var result = eval(durasi) * rate;
    $('#total').val(result);
}


    </script>




</body>
</html>
<?php

?>