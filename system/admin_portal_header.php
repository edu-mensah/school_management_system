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
    
<!-- <h1><?php //$_SESSION['last_name'] ?></h1> -->



<div class="main-body-wrapper">
    <div class="portal-head-wrapper">
        <h2 class="portal-text">PORTAL</h2>
        <div class="logout-wrapper">
            <a href="./logout.php"> <i class="fas fa-arrow-circle-right"></i> LOGOUT</a>
        </div>
    </div>
    <div class="portal-body-wrapper">
        <div class="side-bar-wrapper">
            <div class="personal-details-wrapper">
                <div class="profile-pic-wrapper">
                    <?php 
                        if (strtolower($_SESSION['gender']) == 'female') {
                            echo '<img src="images/uploads/female_avatar.svg" alt="profile picture">';
                        } elseif (strtolower($_SESSION['gender']) == 'male') {
                            echo '<img src="images/uploads/male_avatar.svg" alt="profile picture">';
                        }
                    ?>
                </div>
                <div class="profile-name-wrapper">
                    <p><?= $_SESSION['last_name'] ?></p>
                    <span><i class="fas fa-circle" id="online"></i> Admin</span>
                </div>
            </div>
            <div class="side-bar-functions-wrapper">
                <ul class="side-bar-links">
                    <li>
                         <span><i class="fas fa-tachometer-alt"></i> Dashboard</span>
                    </li>
                    <li> 
                        <span> <i class="fas fa-users"></i> Instructors</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> Students</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li>
                         <span> <i class="fas fa-clone"></i> Courses</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li>
                         <span> <i class="fas fa-calendar-alt"></i> Batches</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li>
                         <span><i class="fas fa-dice"></i> Classes</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li>
                         <span><i class="fas fa-cedi-sign"></i> Fees and Payment</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li>
                         <span><i class="fas fa-book"></i> Books</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li>
                         <span><i class="fas fa-clipboard"></i> Notice Board</span> <i class="fas fa-chevron-down"></i>
                    </li>
                    <li>
                         <span> <i class="fas fa-check-double"></i> Assessments</span></i>
                    </li>
                    <li>
                        <span> <i class="fas fa-cog"></i> Settings</span> 
                    </li>
                </ul>
            </div>
        </div>