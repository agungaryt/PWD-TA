<?php
session_start();
$_SESSION = [];
session_destroy();

setcookie('id', '', time()-3600);
setcookie('username', '', time()-3600);

header("Location: loginTA.php");
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>