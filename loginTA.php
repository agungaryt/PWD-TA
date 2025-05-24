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
    <title>Login Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right,rgba(14, 43, 74, 0.68),rgba(155, 53, 124, 0.69));
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .login-box {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-box h1 {
            margin-bottom: 20px;
            font-weight: bold;
            color:rgb(238, 246, 255);
        }

        .btn-primary {
            background-color:rgb(4, 49, 163);
            border: none;
        }

        .btn-primary:hover {
            background-color:rgb(68, 110, 207);
        }

        .form-check-label {
            font-size: 0.9rem;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="" method="POST" class="login-box">
        <h1 class="text-center">Login Akun</h1>
        <div class="mb-3">
            <label for="username" class="form-label" style="color: white;">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" style="color: white;">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label" style="color: white;">Remember me</label>
        </div>
        <div class="d-grid">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
        <p class="mt-3 text-center" style="color: white;">Belum punya akun? <a href="registerTA.php">Daftar di sini</a></p>
    </form>
</body>
</html>
