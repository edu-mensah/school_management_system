<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['add_course'])) {
    
    $module_id = validate_text_input($_POST['module_id']);
    $module_title = validate_text_input($_POST['module_title']);
    $course_id = validate_text_input($_POST['course_id']);



    $user_data = 'course_id=' . $course_id . '&module_title=' . $module_title . '&module_id=' . $module_id;


 


     if (empty($module_id)) {
        header("Location: ../portal/courses.php?module_id_error=Module Code is required.&$user_data");
        exit();
    }


    if (empty($module_title)) {
        header("Location: ../portal/courses.php?module_title_error=Module title is required.&$user_data");
        exit();
    }



    if (empty($course_id)) {
        header("Location: ../portal/courses.php?course_id_error=Course is required.&$user_data");
        exit();        
    }



    $module_insert_query = "INSERT INTO `modules`(`module_id`, `module_title`, `course_id`) VALUES (:module_id,:module_title,:course_id);";
    $stmt = $connection->prepare($module_insert_query);
    

    if($stmt->execute(['module_id' => $module_id, 'module_title' => $module_title, 'course_id' => $course_id ])){
        header("Location: ../portal/courses.php?success=Module added");
        exit();
    } else {
        header("Location: ../portal/courses.php?error=Something went wrong. Please try again&$user_data");
        exit();
    }









} else {
    header("Location: ../portal/courses.php");
    exit();
}