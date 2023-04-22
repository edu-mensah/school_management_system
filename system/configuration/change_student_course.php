<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_course'])) {

    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];


    $update_student_query = "UPDATE students SET course_id = :course_id WHERE student_id = :student_id;";
    $stmt_update = $connection->prepare($update_student_query);




    if($stmt_update->execute(['course_id' => $course_id, 'student_id' => $student_id])){
        header("Location: ../portal/students.php?success=Student course changed");
        exit();
    } else {
        header("Location: ../portal/students.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/students.php");
    exit();
}