<?php


include_once '../database_connection/database_connection.php';



if (isset($_POST['submit'])) {

    $course_id = $course_title = $course_fee = 0;


    ###############
    $course_id = strtoupper(htmlspecialchars(strip_tags($_POST['course_id'])));
    $course_title =ucwords(htmlspecialchars( strip_tags($_POST['course_title'])));
    $course_fee = htmlspecialchars( strip_tags($_POST['course_fee']));
    intval($course_fee);


    $new_course_data = 'course_id=' . $course_id . '&course_title=' . $course_title . '&course_fee=' . $course_fee;

    if (empty($course_id)) {
    header("Location: ../admin_portal_courses.php?course_id_error=This field is empty&$new_course_data");
    exit();

    }

    if (empty($course_title)) {
    header("Location: ../admin_portal_courses.php?course_title_error=This field is empty&$new_course_data");
    exit();

    }

    if (empty($course_fee)) {
    header("Location: ../admin_portal_courses.php?course_fee_error=This field is empty&$new_course_data");
    exit();

    }

    ###############################################################
    // Fetching from the database

    $new_course_select_query = "SELECT * FROM `students` WHERE course_id = :course_id";
     // Preparing statement new course
    $stmt_new_course = $DatabaseConnection->prepare($new_course_select_query);
    $stmt_new_course->execute(['course_id' => $course_id]);

    if ($stmt_new_course->rowCount() > 0) {
        header("Location: ../admin_portal_courses.php?course_id_error=course already exist&$new_course_data");
        exit();
    }

    $new_course_insert_query = "INSERT INTO `courses`(`course_id`, `course_title`, `course_fee`) VALUES (:course_id,:course_title,:course_fee)";
    $stmt_insert_course = $DatabaseConnection->prepare($new_course_insert_query);
    if ($stmt_insert_course->execute(['course_id' => $course_id, 'course_title' => $course_title, 'course_fee' => $course_fee] )) {
        header("Location: ../admin_portal_courses.php?course_insert_succes=course added");
        exit();
    } else {
        header("Location: ../admin_portal_courses.php?course_insert_error=something went wrong please try again&$new_course_data");
        exit();
    }



} else {
    header("Location: ../admin_portal_courses.php");
    exit();
}
