<?php

include_once('../database_connection/connection_instance.php');
include_once('../classes/Instructor.php');
include_once('../functions/functions.php');

$instructor = new Instructor($connection);


if (isset($_POST['add_intructor'])) {

    $instructor_id  = generate_account_id("INS");
    $last_name = validate_text_input($_POST['last_name']);
    $first_name = validate_text_input($_POST['first_name']);
    $other_names = validate_text_input($_POST['other_names']);
    $email = validate_text_input($_POST['email']);
    $phone_number = validate_text_input($_POST['phone_number']);
    
}


if (isset($_POST['change_course'])) {
    
} else {
    header("Location: ../portal/instructors.php");
}