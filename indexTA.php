<?php
include 'koneksiTA.php';
session_start();
if(!isset($_SESSION["login"])){
    header ("Location: loginTA.php");
    exit;
}
$query = mysqli_query($konek, "SELECT * FROM spek"); //NGAMBIL DARI TABLE

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
.card:hover {
  transform: scale(1.03);
  transition: 0.3s ease;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

body {
      background: url('AssetTA/background.jpg') no-repeat center center fixed;
      background-size: cover;
    }
</style>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>
    <div class="py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Arahphone</h1>
        <p class="lead">Jual HP termurah hanya di arahphone aja ^_^ </p>
    </div>
</div>

<!-- MERK SECTION -->
<div id="merk" class="container text-center mt-5">
    <h3>Merek HP di Arahphone</h3>
    <div class="row mt-4">
  <!-- Samsung -->
  <div class="col-md-4 mb-4">
    <a href="samsung.php" class="text-decoration-none text-dark">
      <div class="card h-100" style="background-color:rgb(0, 0, 0);">
        <img src="AssetTA/logosamsung.jpg" class="card-img-top" alt="Samsung" style="height: 250px; object-fit: cover;">
        <div class="card-body text-center">
          <h5 class="card-title" style="color: white;">Samsung</h5>
        </div>
      </div>
    </a>
  </div>

  <!-- Realme -->
  <div class="col-md-4 mb-4">
    <a href="realme.php" class="text-decoration-none text-dark">
      <div class="card h-100" style="background-color:rgb(227, 172, 6);">
        <img src="AssetTA/logorealme.png" class="card-img-top" alt="Realme" style="height: 250px; object-fit: cover;">
        <div class="card-body text-center">
          <h5 class="card-title">Realme</h5>
        </div>
      </div>
    </a>
  </div>

  <!-- Xiaomi -->
  <div class="col-md-4 mb-4">
    <a href="xiaomi.php" class="text-decoration-none text-dark">
      <div class="card h-100" style="background-color:rgb(235, 94, 29);">
        <img src="AssetTA/logoxiaomi.png" class="card-img-top" alt="Xiaomi" style="height: 250px; object-fit: cover;">
        <div class="card-body text-center">
          <h5 class="card-title">Xiaomi</h5>
        </div>
      </div>
    </a>
  </div>
</div>

<div class="container fluid" id="about">
    <h3 class="text-center">About Us</h3>
    <div class="row mt-4 align-items-center">
        <div class="col-md-4">
            <img src="AssetTA/logoToko.png" class="img-fluid" alt="About Us">
        </div>
        <div class="col-md-8">
            <p>Arahphone adalah toko handphone terpercaya yang menyediakan berbagai produk smartphone berkualitas dari merek ternama seperti Samsung, Xiaomi, dan Realme dengan harga kompetitif.
             Kami berkomitmen untuk memberikan pelayanan terbaik, produk original, dan garansi resmi kepada setiap pelanggan.</p>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer >
    <div class="container">
        <div class="text-center mb-3">
            <h5 class="fw-bold">ARAHPHONE</h5>
        </div>
        
        <hr class="my-3">
        
        <div class="text-center small">
            <p class="mb-1">Copyright © Arahphone 2025</p>
            <p class="mb-3">Arahphone adalah toko HP terpercaya yang menyediakan smartphone original dari merek ternama dengan harga terjangkau dan garansi resmi. Kami siap membantu Anda menemukan handphone terbaik untuk kebutuhan sehari-hari.
</p>
            
            <div class="kontak">
                <p class="mb-1">Kontak: Jl. Raya No. 123</p>
                <p class="mb-1">Email: info@arahphone.com</p>
                <p>Telepon: 1500-123</p>
            </div>
        </div>
    </div>
</footer>
    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
