<?php

include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');



if (isset($_POST['delete'])) {

    $batch_id = $_POST['batch_id'];


    $delete_batch = "DELETE FROM `batches` WHERE batch_id = :batch_id;";
    $stmt_del = $connection->prepare($delete_batch);



    if($stmt_del->execute(['batch_id' => $batch_id])){
        header("Location: ../portal/batches.php?success=Batch deleted.");
        exit();
    } else {
        header("Location: ../portal/batches.php?error=Something went wrong. Please try again.");
        exit();
    }




}else {
    header("Location: ../portal/batches.php");
}