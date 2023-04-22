<?php

include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');





if (isset($_POST['change_course'])) {

    $instructor_id = $_POST['instructor_id'];
    $course_id = $_POST['course_id'];



    $update_instructor = "UPDATE instructors SET course_id = :course_id WHERE instructor_id = :instructor_id;";
    $stmt_update = $connection->prepare($update_instructor);



    if($stmt_update->execute(['instructor_id' => $instructor_id, 'course_id' => $course_id])){
        header("Location: ../portal/instructors.php?success=Instructor course changed.");
        exit();
    } else {
        header("Location: ../portal/instructors.php?error=Something went wrong. Please try again.");
        exit();
    }



    
} else {
    header("Location: ../portal/instructors.php");
}