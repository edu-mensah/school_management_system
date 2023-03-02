<?php
// initializing a session
session_start();


// Checking if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["email"]) && !isset($_SESSION['student_id'])){
    header("Location:" . ROOTDIR . "/index.php");
    exit();
}

    require_once 'portal_header.php';

?>

























<?php 
    require_once 'portal_footer.php';
 ?>