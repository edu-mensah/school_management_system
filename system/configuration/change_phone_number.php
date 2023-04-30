<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_phone_number'])) {

    $user_id = strtolower($_POST['user_id']);
    $account_type = strtolower( $_POST['account_type']);
    $phone_number = validate_text_input($_POST['phone_number']);

    $table ='';
    $column = '';


     switch ($account_type) {
        case 'administrator':
            $table = 'administrators';
            $column = 'admin_id';
            break;

        case 'instructor':
            $table = 'instructors';
            $column = 'instructor_id';
            break;
        
        case 'student':
            $table = 'students';
            $column = 'student_id';
            break;

        default:
            $table = null;
            break;
    }


    if (empty($phone_number)) {
        header("Location: ../portal/settings.php?phone_number_error=Please enter a number");
        exit();
    }

    if (strlen($phone_number) < 10) {
        header("Location: ../portal/settings.php?phone_number_error=Phone number is less 10 digits");
        exit();
    }



    


    $update_query = "UPDATE $table SET phone_number = :phone WHERE $column = :user_id;";
    $stmt_update = $connection->prepare($update_query);


    if($stmt_update->execute(['phone' => $phone_number, 'user_id' => $user_id])){
        header("Location: ../portal/settings.php?success=Phone number changed");
        exit();
    } else {
        header("Location: ../portal/settings.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/settings.php");
    exit();
}