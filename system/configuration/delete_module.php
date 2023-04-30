<?php

include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');



if (isset($_POST['delete'])) {

    $module_id = $_POST['module_id'];


    $delete_query = "DELETE FROM modules WHERE module_id = :module_id;";
    $stmt_del = $connection->prepare($delete_query);



    if($stmt_del->execute(['module_id' => $module_id])){
        header("Location: ../portal/courses.php?success=Module deleted.");
        exit();
    } else {
        header("Location: ../portal/courses.php?error=Something went wrong. Please try again.");
        exit();
    }




}else {
    header("Location: ../portal/courses.php");
}