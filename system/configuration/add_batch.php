<?php


include_once('../database_connection/connection_instance.php');
include_once('../classes/Batch.php');
include_once('../functions/functions.php');


$batch = new Batch($connection);


if (isset($_POST['add_batch'])) {

    $batch_id = generate_account_id('bg');
    
    $batch_name = validate_text_input($_POST['batch_name']);
    $start_date = format_date(validate_text_input($_POST['start_date']));
    $completion_date = format_date(validate_text_input($_POST['completion_date']));
    $class_time = validate_text_input($_POST['class_time']);
    $instructor_id = validate_text_input($_POST['instructor_id']);



    $user_data = 'batch_name=' . $batch_name;


 


     if (empty($batch_name)) {
        header("Location: ../portal/batches.php?batch_name_error=Batch name is required.&$user_data");
        exit();
    }


    if (empty($start_date)) {
        header("Location: ../portal/batches.php?start_date_error=Start date is required.&$user_data");
        exit();
    }



    if (empty($completion_date)) {
        header("Location: ../portal/batches.php?completion_date_error=Completion date is required.&$user_data");
        exit();        
    }

    if (empty($class_time)) {
        header("Location: ../portal/batches.php?class_time_error=Assign a Class time&$user_data");
        exit();        
    }

    if (empty($instructor_id)) {
        header("Location: ../portal/batches.php?instructor_id_error=Assign an instructor.&$user_data");
        exit();        
    }



    $add_batch = $batch->create_batch($batch_id,$batch_name,$start_date,$completion_date,$class_time,$instructor_id);


    if($add_batch){
        header("Location: ../portal/batches.php?success=Batch created");
        exit();
    } elseif ($add_batch === -1) {
        header("Location: ../portal/batches.php?error=Something went wrong. Please try again&$user_data");
        exit();
    }









} else {
    header("Location: ../portal/batches..php");
    exit();
}