<?php
// initializing a session
session_start();

// Checking if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // header("Location:"");
    exit();
}


// the DBconnection
require_once 'database_connection.php';
// all function
require_once 'funtions.php';


// Defining variables and initializing with empty values
$email = $password = $institutional_id = "";

// checks, validation and authentication
if (isset($_POST['submit'])) {
    
}