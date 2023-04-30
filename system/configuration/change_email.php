<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['change_email'])) {

    $user_id = $_POST['user_id'];
    $account_type = strtolower( $_POST['account_type']);
    $email = validate_text_input($_POST['email']);

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


    if (empty($email)) {
        header("Location: ../portal/settings.php?email_error=Please enter your email");
        exit();
    }

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: ../portal/settings.php?email_error=Invalid email");
        exit();
    }

    $select_email = "SELECT * FROM $table WHERE email = :email;";
    $stmt_email = $connection->prepare($select_email);
    $stmt_email->execute(['email' => $email]);


    if ($stmt_email->rowCount() > 0) {
        header("Location: ../portal/settings.php?email_error=Email is already taken");
        exit();
    }


    

    $update_query = "UPDATE $table SET email = :email WHERE $column = :user_id;";
    $stmt_update = $connection->prepare($update_query);


    if($stmt_update->execute(['email' => $email, 'user_id' => $user_id])){
        header("Location: ../portal/settings.php?success=Email changed");
        exit();
    } else {
        header("Location: ../portal/settings.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/settings.php");
    exit();
}