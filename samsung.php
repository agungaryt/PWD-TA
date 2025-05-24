<?php
include 'koneksiTA.php';
session_start();
if(!isset($_SESSION["login"])){
    header ("Location: loginTA.php");
    exit;
}
$query = mysqli_query($konek, "SELECT * FROM spek WHERE merk = 'SAMSUNG'"); //NGAMBIL DARI TABLE

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Arahphone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                       <a class="nav-link active" href="indexTA.php">Home</a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="#">About us</a>
                         </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="logoutTA.php">Logout</a>
                    </li>
                      <li class="nav-item">
                     <a class="nav-link" href="pemesanan.php">Pemesanan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Merk
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="samsung.php">Samsung</a></li>
                            <li><a class="dropdown-item" href="xiaomi.php">Xiaomi</a></li>
                            <li><a class="dropdown-item" href="realme.php">Realme</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while($row = mysqli_fetch_assoc($query)) { ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="AssetTA/<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['nama_barang'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['nama_barang'] ?></h5>
                            <p class="card-text"><?= $row['spesifikasi'] ?></p>
                            <p class="card-text">Rp. <?= number_format($row['harga'], 0, ',', '.') ?></p>
                           <a href="pemesanan.php" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>