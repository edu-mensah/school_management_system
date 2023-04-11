<?php
// initializing a session
session_start();


// Checking if the user is already logged in, if no then redirect  to login page
if(!isset($_SESSION["last_name"]) && !isset($_SESSION['email'])){
    header("Location: ../../index.php");
    exit();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../media/icons/favicon.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= strtoupper($_SESSION['account_type']) ?> PORTAL</title>
    <!-- custom styling -->
    <link rel="stylesheet" href="../css/portal_header.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/portal.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/button_bar.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/settings.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/instructors.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/students.css?v=<?= time();?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>
<body>
    

    <div class="portal-head-wrapper">
        <h3 class="account_type-text"> <?= strtoupper($_SESSION['account_type']) ?> PORTAL</h3>
        <div class="logout-wrapper">
            <a href="../configuration/logout.php"> <i class="fas fa-arrow-circle-right"></i> LOGOUT</a>
        </div>
    </div>