<?php


include_once('../database_connection/connection_instance.php');
include_once('../classes/Student.php');
include_once('../functions/functions.php');




if (isset($_POST['delete'])) {
    $student_id = $_POST['student_id'];

    $del_student_query = "DELETE FROM students WHERE student_id = :student_id;";
    $stmt_del = $connection->prepare($del_student_query);




    if($stmt_del->execute(['student_id' => $student_id])){
        header("Location: ../portal/students.php?success=Student deleted");
        exit();
    } else{
        header("Location: ../portal/students.php?error=Something went wrong. Please try again");
        exit();
    }



} else {
    header("Location: ../portal/students.php");
    exit();
}