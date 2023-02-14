<?php
$severName = "localhost";
$userName = "root";
$password = "edu@root";
$DBname = "school_management_system_DB";

$DBconn = mysqli_connect($severName, $userName, $password, $DBname);

if (!$DBconn) {
    die("Connection failed: " . mysqli_connect_error());
}