<?php

include "koneksiTA.php";

if(isset($_POST["register"])){
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if($password != $password2){
        echo "<script>
        alert('input password salah')
        </script>";
    }else {
        //untuk masukin ke database ini enkripsinyya
        $password= password_hash($password, PASSWORD_DEFAULT);

        //masukin ke database
        $query = "INSERT INTO pengguna (username, password) VALUES ('$username','$password')";
        $q = mysqli_query($konek, $query);

        if($q){
            header("Location: loginTA.php");
            exit;
        }else{
            echo "<script>
            alert('user gagal ditambahkan')
            </script>";
        }
}}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Anda</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Registrasi Akun</h1>
        <label for="username">username</label>
        <input type="text" name="username" id=username><br>
        <label for="password">password</label>
        <input type="password" name="password" id=password><br>
        <label for="password2">Konfirmasi password anda</label>
        <input type="password" name="password2" id=password2><br>
        <input type="submit" value="register" name="register"><br>
</body>
</html>