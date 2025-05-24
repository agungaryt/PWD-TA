<?php
include 'koneksiTA.php';
session_start();
if(!isset($_SESSION["login"])){
    header ("Location: loginTA.php");
    exit;
}
$nama = $_GET['namaDepan'] . " " . $_GET['namaBelakang'];
$nohp =  $_GET['nohp'];
$kode_barang = $_GET['hp'];
$jumlah = (int) $_GET['jumlah'];
$alamat = $_GET['alamat'];
$metode = $_GET['metode'];
$query = mysqli_query($konek, "SELECT * FROM spek WHERE kode_barang = '$kode_barang'");
$hp = mysqli_fetch_assoc($query);
$nama_barang = $hp['nama_barang'];
$harga_satuan = $hp['harga'];
$total_harga = $harga_satuan * $jumlah;
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
    <div class="container col-md-6 struk">
    <h5 class="text-center mb-4">Struk Pembelian - Arahphone</h5>
    <table class="table table-borderless">
        <tr>
            <th>Nama</th>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <th>No HP</th>
            <td><?php echo "+62$nohp"; ?></td>
        </tr>
        <tr>
            <th>HP</th>
           <td><?php echo "$nama_barang ($jumlah pcs) - Rp " . number_format($harga_satuan, 0, ',', '.'); ?>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <th>Total</th>
            <td><?php echo "Rp " . number_format($total_harga, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <th>Metode Pembayaran</th>
            <td><?php echo $metode; ?></td>
        </tr>
    </table>

    <div class="card text-center p-3 mt-3">
        <h5>Terima kasih telah berbelanja di Arahphone!</h5>
    </div> 
</div>
</div>
</body>
</html>