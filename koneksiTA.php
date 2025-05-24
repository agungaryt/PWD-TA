<?php
$host="localhost";
$user="root";
$pass="";
$db="pwdta";

$konek = mysqli_connect($host, $user, $pass, $db); //buat konek ke db

if ($konek->connect_error){
    die('Maaf koneksi gagal atau tidak terhubung :'. $konek->connect_error);
}
?>