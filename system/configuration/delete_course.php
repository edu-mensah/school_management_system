<?php

include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');



if (isset($_POST['delete'])) {

    $course_id = $_POST['course_id'];


    $delete_course = "DELETE FROM courses WHERE course_id = :course_id;";
    $stmt_del = $connection->prepare($delete_course);



    if($stmt_del->execute(['course_id' => $course_id])){
        header("Location: ../portal/courses.php?success=Course deleted.");
        exit();
    } else {
        header("Location: ../portal/courses.php?error=Something went wrong. Please try again.");
        exit();
    }




}else {
    header("Location: ../portal/courses.php");
}