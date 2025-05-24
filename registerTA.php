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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Akun Anda</title>
    <style>
        /* CSS buat layout form di tengah dengan background transparan */
        body {
            background: url('AssetTA/background.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.7);
            width: 300px;
            color: white;
        }
        h1 {
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 10px;
            background-color: #1e90ff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0d6efd;
        }
        p {
            margin-top: 15px;
            text-align: center;
        }
        a {
            color: #1e90ff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h1>Registrasi Akun</h1>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required />

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required />

        <label for="password2">Konfirmasi Password</label>
        <input type="password" name="password2" id="password2" required />

        <input type="submit" value="Register" name="register" />
        <p>Sudah punya akun? <a href="loginTA.php">Login di sini</a></p>
    </form>
</body>
</html>
