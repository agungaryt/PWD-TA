<?php
include "koneksiTA.php";
session_start();

if(isset($_COOKIE['id']) && isset($_COOKIE['username'])){
    $id = $_COOKIE['id'];
    $username = $_COOKIE['username'];
    
    //ambil username berdasarkan id
    $result = mysqli_query($konek, "SELECT*FROM pengguna where id= '$id' ");
    $row = mysqli_fetch_assoc($result);

    if($username === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}
if(isset($_POST["login"])){
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];

    //ambil data dri tabel
    $result = mysqli_query($konek, "SELECT*FROM pengguna where username= '$username' ");
    
    if (mysqli_num_rows($result)==1 ){
        // mysqli_num_row untuk melihat brp data yg diambil $result
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row["password"])){
            $_SESSION["login"]= true;

            if(isset($_POST["remember"])){
                setcookie('id', $row['id'], time()+3600); //satuan detik
                setcookie('username',hash('sha256',$row['username']), time()+3600);
            }
        header ("Location: indexTA.php");
        exit;
        };
    }
    echo "<script>
    alert('username/password salah')
    </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Akun</title>
</head>
<body>
    <form action="" method="POST">
        <h1>login Akun</h1>
        <label for="username">username</label>
        <input type="text" name="username" id=username><br>
        <label for="password">password</label>
        <input type="password" name="password" id=password><br>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">remember me</label><br>
        <input type="submit" value="login" name="login"><br>
        <p>Belum punya akun? <a href="registerTA.php">Daftar akun di sini</a></p>
</body>
</html>