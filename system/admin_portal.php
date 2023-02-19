<?php
// initializing a session
session_start();


// Checking if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["email"]) && !isset($_SESSION['institutional_id'])){
    header("Location: ./index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/icons/logo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin portal</title>
    <!-- custom styling -->
    <link rel="stylesheet" href="css/admin_portal.css?v=<?= time();?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>
    
<h1><?= $_SESSION['last_name'] ?></h1>


<a href="./logout.php">LOGOUT</a>


<script src="fontawesome/js/all.js"></script>
</body>
</html>