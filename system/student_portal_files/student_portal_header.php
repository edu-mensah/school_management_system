<?php
define("ROOTDIR", dirname("/school_management_system/system"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/icons/favicon.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student portal</title>
    <!-- custom styling -->
    <link rel="stylesheet" href="css/admin_portal.css?v=<?= time();?>">
    <link rel="stylesheet" href="css/admin_portal_instructors.css?v=<?= time();?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>
<body>
    

    <div class="portal-head-wrapper">
        <h2 class="portal-text">SCHOOL PORTAL</h2>
        <div class="logout-wrapper">
            <a href="includes_/logout.php"> <i class="fas fa-arrow-circle-right"></i> LOGOUT</a>
        </div>
    </div>