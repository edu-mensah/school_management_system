<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_class_time'])) {

    $class_time = $_POST['class_time'];
    $batch_id = $_POST['batch_id'];


    $update_batch_query = "UPDATE `batches` SET class_time = :class_time WHERE batch_id = :batch_id;";
    $stmt_update = $connection->prepare($update_batch_query);


    if($stmt_update->execute(['batch_id' => $batch_id, 'class_time' => $class_time])){
        header("Location: ../portal/batches.php?success=Class time changed");
        exit();
    } else {
        header("Location: ../portal/batches.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/batches.php");
    exit();
}