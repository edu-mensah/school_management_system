<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_instructor'])) {

    $instructor_id = $_POST['instructor_id'];
    $batch_id = $_POST['batch_id'];


    $update_batch_query = "UPDATE `batches` SET instructor_id = :instructor_id WHERE batch_id = :batch_id;";
    $stmt_update = $connection->prepare($update_batch_query);


    if($stmt_update->execute(['batch_id' => $batch_id, 'instructor_id' => $instructor_id])){
        header("Location: ../portal/batches.php?success=Instructor changed");
        exit();
    } else {
        header("Location: ../portal/batches.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/batches.php");
    exit();
}