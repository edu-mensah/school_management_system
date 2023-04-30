<?php

include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');



if (isset($_POST['delete'])) {

    $student_id = $_POST['student_id'];


    $delete_assessment = "DELETE FROM `assessments` WHERE student_id = :student_id;";
    $stmt_del = $connection->prepare($delete_assessment);



    if($stmt_del->execute(['student_id' => $student_id])){
        header("Location: ../portal/assessments.php?success=Assessment deleted.");
        exit();
    } else {
        header("Location: ../portal/assessments.php?error=Something went wrong. Please try again.");
        exit();
    }




}else {
    header("Location: ../portal/assessments.php");
}