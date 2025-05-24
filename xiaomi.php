<?php
include 'koneksiTA.php';
// session_start();
// if(!isset($_SESSION["login"])){
//     header ("Location: loginTA.php");
//     exit;
// }
$query = mysqli_query($konek, "SELECT * FROM spek WHERE merk = 'XIAOMI'"); //NGAMBIL DARI TABLE

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
  body {
    background: url('AssetTA/background.jpg') no-repeat center center fixed;
    background-size: cover;
    color: white;
  }
 .card-scroll-container {
      display: flex;
      overflow-x: auto;
      gap: 1.5rem;
      padding-bottom: 1rem;
      scroll-snap-type: x mandatory;
    }
    
    .card-scroll-container::-webkit-scrollbar {
      height: 8px;
    }

    .card-scroll-container::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 4px;
    }

    .card {
      min-width: 300px;
      flex: 0 0 auto;
      scroll-snap-align: start;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease;
      background-color: rgba(0, 0, 0, 0.6); 
     color: white; 
    }

  .card:hover {
    transform: scale(1.03);
    transition: 0.3s ease
    box-shadow: 0 8px 20px rgba(255, 115, 0, 0.3);
  }
  .card-title {
    font-weight: bold;
  }
</style>

</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Daftar HP Xiaomi</h2>
        <div class="card-scroll-container mt-4">
            <?php while($row = mysqli_fetch_assoc($query)) { ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="AssetTA/<?= $row['gambar'] ?>" class="card-img-top"style="width: 100%; height: 200px; object-fit: contain"  alt="<?= $row['nama_barang'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['nama_barang'] ?></h5>
                            <p class="card-text"><?= $row['spesifikasi'] ?></p>
                            <p class="card-text">Rp. <?= number_format($row['harga'], 0, ',', '.') ?></p>
                            <a href="pemesanan.php" class="btn btn-warning text-dark fw-bold">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
