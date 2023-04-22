<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_completion_status'])) {

    $completion_status = $_POST['completion_status'];
    $batch_id = $_POST['batch_id'];


    $update_batch_query = "UPDATE `batches` SET `completion_status` = :completion_status WHERE batch_id = :batch_id;";
    $stmt_update = $connection->prepare($update_batch_query);


    if($stmt_update->execute(['batch_id' => $batch_id, 'completion_status' => $completion_status])){
        header("Location: ../portal/batches.php?success=Status changed");
        exit();
    } else {
        header("Location: ../portal/batches.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/batches.php");
    exit();
}