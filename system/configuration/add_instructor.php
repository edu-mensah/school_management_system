<?php

include_once('../database_connection/connection_instance.php');
include_once('../classes/Instructor.php');
include_once('../functions/functions.php');

$instructor = new Instructor($connection);


if (isset($_POST['add_instructor'])) {

    $instructor_id  = generate_account_id("ins");
    $last_name = validate_text_input($_POST['last_name']);
    $first_name = validate_text_input($_POST['first_name']);
    $other_names = validate_text_input($_POST['other_names']);
    $email = validate_text_input($_POST['email']);
    $phone_number = validate_text_input($_POST['phone_number']);
    $birth_date = format_date(validate_text_input($_POST['birth_date']));
    $gender = validate_text_input($_POST['gender']);
    $course_id = validate_text_input($_POST['course_id']);
    $res_address = validate_text_input($_POST['res_address']);
    $hire_date = format_date(validate_text_input($_POST['hire_date']));



    $picture_name = $_FILES['profile_picture']['name'];
    $picture_temp_name = $_FILES['profile_picture']['tmp_name'];
    $picture_size = $_FILES['profile_picture']['size'];
    $picture_type = $_FILES['profile_picture']['type'];

    $user_data = 'last_name=' . $last_name . '&first_name=' . $first_name . '&other_names=' . $other_names . '&email=' . $email . '&phone_number=' . $phone_number . '&gender=' . $gender . '&res_address=' . $res_address;




     if (empty($first_name)) {
        header("Location: ../portal/instructors.php?first_name_error=Fisrt Name is required.&$user_data");
        exit();
    }


    if (empty($last_name)) {
        header("Location: ../portal/instructors.php?last_name_error=Last Name is required.&$user_data");
        exit();
    }


    if (empty($other_names)) {
        $other_names = NULL;
    }

    if (empty($email)) {
        header("Location: ../portal/instructors.php?email_error=Email is required.&$user_data");
        exit();
    }

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: ../portal/instructors.php?email_error=Invalid email.&$user_data");
        exit();
    }

    $select_query = "SELECT * FROM instructors WHERE email = :email;";
    $stmt_email = $connection->prepare($select_query);
    $stmt_email->execute(['email' => $email]);

    if ($stmt_email->rowCount() > 0) {
        header("Location: ../portal/instructors.php?email_error=This email is taken.&$user_data");
        exit();        
    }

    if (empty($phone_number)) {
        header("Location: ../portal/instructors.php?phone_number_error=Phone Number is required.&$user_data");
        exit();
    }

    if (empty($birth_date)) {
        header("Location: ../portal/instructors.php?birth_date_error=Birth date is required.&$user_data");
        exit();
    }


    if (empty($hire_date)) {
        header("Location: ../portal/instructors.php?hire_date_error=Hire date is required.&$user_data");
        exit();
    }

    if (empty($gender)) {
        header("Location: ../portal/instructors.php?gender_error=Gender is required.&$user_data");
        exit();
    }

    if (empty($course_id)) {
        $course_id = NULL;
    }

    if (empty($picture_name)) {
        header("Location: ../portal/instructors.php?picture_error=Picture is required.&$user_data");
        exit();
    }




    $allowed_ext = ['jpeg','jpg','png'];
    $picture_ext = explode('.',$picture_name);
    $picture_ext = strtolower(end($picture_ext));

 
    if (!(in_array($picture_ext,$allowed_ext))) {
        header("Location: ../portal/instructors.php?picture_error=Picture type not allowed&$user_data");
        exit();
    }

    if (($_POST['profile_picture']['size'] > 0)) {
        header("Location: ../portal/instructors.php?picture_error=Picture error. please try again&$user_data");
        exit();
    }










    $new_picture_name = $instructor_id . "." . $picture_ext;
    $picture_folder = __DIR__ . '../media/profile_pictures/' . $new_picture_name;
    move_uploaded_file($picture_temp_name,$picture_folder);



    $add_instructor = $instructor->add_instructor($instructor_id,$last_name,$first_name,$other_names,$email,$phone_number,$birth_date,$gender,$res_address,$hire_date,$course_id,$new_picture_name);



    if($add_instructor){
        header("Location: ../portal/instructors.php?success=Instructor added");
        exit();
    } elseif ($add_instructor === -1) {
        header("Location: ../portal/instructors.php?error=Something went wrong. Please try again&$user_data");
        exit();
    }





    
} else {
    header("Location: ../portal/instructors.php");
}