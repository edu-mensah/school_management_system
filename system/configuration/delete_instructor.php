<?php

include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');



if (isset($_POST['delete'])) {

    $instructor_id = $_POST['instructor_id'];


    $delete_instructor = "DELETE FROM instructors WHERE instructor_id = :instructor_id;";
    $stmt_del = $connection->prepare($delete_instructor);



    if($stmt_del->execute(['instructor_id' => $instructor_id])){
        header("Location: ../portal/instructors.php?success=Instructor deleted.");
        exit();
    } else {
        header("Location: ../portal/instructors.php?error=Something went wrong. Please try again.");
        exit();
    }




}else {
    header("Location: ../portal/instructors.php");
}