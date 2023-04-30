<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['record_assessment'])) {
    
    $student_id = validate_text_input($_POST['student_id']);
    $module_id = validate_text_input($_POST['module_id']);
    $quiz_mark = doubleval(validate_text_input($_POST['quiz_mark']));
    $exams_mark = doubleval(validate_text_input($_POST['exams_mark']));



    $ass_insert_query = "INSERT INTO `assessment`(`student_id`, `module_id`, `quiz_mark`, `exams_mark`) VALUES (:student_id,:module_id,:quiz_mark, :exams_mark);";
    $stmt = $connection->prepare($ass_insert_query);
    

    if($stmt->execute(['student_id' => $student_id, 'module_id' => $module_id, 'quiz_mark' => $quiz_mark, 'exams_mark' ])){
        header("Location: ../portal/assessments.php?success=Assessement added");
        exit();
    } else {
        header("Location: ../portal/assessments.php?error=Something went wrong. Please try again");
        exit();
    }









} else {
    header("Location: ../portal/assessments.php");
    exit();
}