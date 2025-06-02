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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: url('AssetTA/background.jpg') no-repeat center center fixed;
        background-size: cover;
        color: white;
    }
    .card {
        margin-top: 50px;
        background-color: rgba(19, 39, 55, 0.49);
        border: none;
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        color: white; 
    }
    .card h3 {
        color: #333;
    }
    .form-control, .form-select, .input-group-text {
        border-radius: 0.5rem;
    }
    label {
        font-weight: 500;
        color: #333;
    }
    .btn-primary {
        padding: 10px 30px;
        border-radius: 2rem;
    }
</style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <?php include 'navbar.php'; ?>
    <div id="pemesanan" class= "container-fluid">
             <div class="container d-flex justify-content-center align-items-center">
        <div class="card w-50">
            <div class="card-body">
            <h3 class="text-center mb-4 text-white">Form pemesanan</h3>
                <form action="struk.php" method="GET"> 
                    <div class="row g-3"> 
                    <div class="col-6">
                    Nama Depan :<br>
                    <input type="text" name="namaDepan" class= "form-control" required><br></div>
                    <div class="col-6">
                    Nama belakang :<br>
                    <input type="text" name="namaBelakang" class= "form-control" required><br></div>
                    </div>
                    No HP :<br>
                    <div class="input-group mb-3"required>
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input type="text" name="nohp" class="form-control" ><br></div>
                    <div class="col-12">
                    ALAMAT :<br>
                    <input type="text" name="alamat" class= "form-control" required><br></div>
                    
                    <div class="row g-3"> 
                    <div class="col-9">
                    Pilih HP<br>
                   <select name="hp" id="inputGroupSelect01" class="form-select w-100" required>
                    <option selected disabled>Pilih HP...</option>
                    <?php while($row = mysqli_fetch_assoc($query)) : ?>
                    <option value="<?= ($row['kode_barang']) ?>">
                    <?= ($row['nama_barang']) ?> - <?= ($row['merk']) ?> (Rp <?= number_format($row['harga'], 0, ',', '.') ?>)
                    </option>
                    <?php endwhile; ?>
                    </select>
                    <br></div>
                    <div class="col-3">
                    jumlah :<br>
                    <input type="text" name="jumlah" class= "form-control"required><br></div>
                    </div>
                    <br>
            
            Metode Pembayaran :<br>
                <input type="radio" name="metode" value="Cash"required> Cash <br>
                <input type="radio" name="metode" value="Transfer"> Transfer Bank <br>
        <br>
        <div class= "text-center">
        <input type="submit" value="Pesan Sekarang" class = "btn btn-primary">
         </div>
    </form>  
            </div>
        </div>
    </div>
         </div>
</body>
</html>
