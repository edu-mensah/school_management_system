<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_fee'])) {

    $course_id = $_POST['course_id'];
    $course_fee = doubleval($_POST['course_fee']);


    $update_course_query = "UPDATE courses SET course_fee = :course_fee WHERE course_id = :course_id;";
    $stmt_update = $connection->prepare($update_course_query);




    if($stmt_update->execute(['course_id' => $course_id, 'course_fee' => $course_fee])){
        header("Location: ../portal/courses.php?success=Course fee changed");
        exit();
    } else {
        header("Location: ../portal/courses.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/courses.php");
    exit();
}