<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_password'])) {

    $user_id = $_POST['user_id'];
    $account_type = strtolower( $_POST['account_type']);
    $new_password = validate_text_input($_POST['new_password']);
    $confirm_password = validate_text_input($_POST['confirm_password']);

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


    if (empty($new_password)) {
        header("Location: ../portal/settings.php?new_password_error=Please enter a password");
        exit();
    }

    if (strlen($new_password) < 7) {
        header("Location: ../portal/settings.php?new_password_error=Password must be more than 7 characters");
        exit();
    }

    if ($new_password != $confirm_password ) {
        header("Location: ../portal/settings.php?confirm_password_error=Password does not match");
        exit();
    }


    $hash_password = password_hash($new_password,PASSWORD_DEFAULT);


    $update_query = "UPDATE $table SET pass_word = :pass_word WHERE $column = :user_id;";
    $stmt_update = $connection->prepare($update_query);


    if($stmt_update->execute(['pass_word' => $hash_password, 'user_id' => $user_id])){
        header("Location: ../portal/settings.php?success=Password changed");
        exit();
    } else {
        header("Location: ../portal/settings.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/settings.php");
    exit();
}