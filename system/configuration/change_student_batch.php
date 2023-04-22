<?php


include_once('../database_connection/connection_instance.php');
include_once('../classes/Student.php');
include_once('../functions/functions.php');


$student = new Student($connection);


if (isset($_POST['change_batch'])) {

    $batch_id = $_POST['batch_id'];
    $student_id = $_POST['student_id'];


    $update_student_query = "UPDATE students SET batch_id = :batch_id WHERE student_id = :student_id;";
    $stmt_update = $connection->prepare($update_student_query);




    if($stmt_update->execute(['batch_id' => $batch_id, 'student_id' => $student_id])){
        header("Location: ../portal/students.php?success=Student course changed");
        exit();
    } else {
        header("Location: ../portal/students.php?error=Something went wrong. Please try again");
        exit();
    }





    
}  else {
    header("Location: ../portal/students.php");
    exit();
}