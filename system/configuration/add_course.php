<?php


include_once('../database_connection/connection_instance.php');
include_once('../classes/Course.php');
include_once('../functions/functions.php');


$course = new Course($connection);


if (isset($_POST['add_course'])) {
    
    $course_id = validate_text_input($_POST['course_id']);
    $course_title = validate_text_input($_POST['course_title']);
    $course_fee = validate_text_input($_POST['course_fee']);



    $user_data = 'course_id=' . $course_id . '&course_title=' . $course_title . '&course_fee=' . $course_fee;


 


     if (empty($course_id)) {
        header("Location: ../portal/courses.php?course_id_error=Course ID is required.&$user_data");
        exit();
    }


    if (empty($course_title)) {
        header("Location: ../portal/courses.php?course_title_error=Course title is required.&$user_data");
        exit();
    }



    if (empty($course_fee)) {
        header("Location: ../portal/courses.php?course_fee_error=Course fee is required.&$user_data");
        exit();        
    }



    $add_course = $course->add_course($course_id,$course_title,$course_fee);


    if($add_course){
        header("Location: ../portal/courses.php?success=Course added");
        exit();
    } elseif ($add_course === -1) {
        header("Location: ../portal/courses.php?error=Something went wrong. Please try again&$user_data");
        exit();
    }









} else {
    header("Location: ../portal/courses.php");
    exit();
}