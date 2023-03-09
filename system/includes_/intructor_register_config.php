<?php 

include_once '../database_connection/database_connection.php';
require_once '../functions/functions.php';




if (isset($_POST['register'])) {

   
$instructor_id = '';
$first_name = validate_text_input($_POST['first_name']);
$last_name = validate_text_input($_POST['last_name']);
$other_names = validate_text_input($_POST['other_names']);
$email = validate_text_input($_POST['email']);
$phone_number = validate_text_input('phone_number');
$birth_date = format_date($_POST['birth_date']);
$gender = validate_text_input($_POST['gender']);
$ssnit_number = validate_text_input($_POST['ssnit_number']);
$salary = validate_text_input($_POST['salary']);
$salary = intval($salary);
$res_address = validate_text_input($_POST['res_address']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);
$course_id = validate_text_input($_POST['course_id']);
$hire_date = format_date($_POST['hire_date']);
$image_file = $_FILES['image'];



$empty_field_error = "This field is empty";



##########################################

    $new_instructor_data = 'instructor_id=' . $instructor_id . '&first_name=' . $first_name . '&last_name=' . $last_name . '&other_names=' . $other_names . '&email=' . $email . '&phone_number=' . $phone_number . '&gender=' . $gender . '&ssnit_number=' . $ssnit_number . '&salary=' . $salary . '&res_address=' . $res_address . '&course_id=' . $course_id;

    if (empty($instructor_id)) {
    header("Location: ../admin_portal_instructors.php?instructor_id_error=$empty_field_error&$new_instructor_data");
    exit();

    }

    if (empty($first_name)) {
    header("Location: ../admin_portal_instructors.php?first_name_error=$empty_field_error&$new_instructor_data");
    exit();

    } 


    if (empty($last_name)) {
    header("Location: ../admin_portal_instructors.php?last_name_error=$empty_field_error&$new_instructor_data");
    exit();

    }

    if (empty($email)) {
    header("Location: ../admin_portal_instructors.php?email_error=$empty_field_error&$new_instructor_data");
    exit();

    }


    


    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    header("Location: ../admin_portal_instructors.php?email_error=This email is invalid&$new_instructor_data");
    exit();

    }



    // Students Data
    $student_user_select_query = "SELECT * FROM `students` WHERE email = :email";
    // Statement student
    $stmt_student = $DatabaseConnection->prepare($student_user_select_query);
    $stmt_student->execute(['email' => $email]);
    if ($stmt_student->rowCount() > 0) {
        header("Location: ../admin_portal_instructors.php?email_error=This email is taken&$new_instructor_data");
        exit();
    } 



    

    if (empty($phone_number)) {
    header("Location: ../admin_portal_instructors.php?phone_number_error=$empty_field_error&$new_instructor_data");
    exit();

    }

    if (empty($birth_date)) {
    header("Location: ../admin_portal_instructors.php?birth_date_error=$empty_field_error&$new_instructor_data");
    exit();

    }

    if (empty($gender)) {
    header("Location: ../admin_portal_instructors.php?gender_error=Please select a gender&$new_instructor_data");
    exit();

    }

    if (empty($salary)) {
    header("Location: ../admin_portal_instructors.php?salary_error=$empty_field_error&$new_instructor_data");
    exit();

    }

    if (empty($course_id)) {
    header("Location: ../admin_portal_instructors.php?course_id_error=$empty_field_error&$new_instructor_data");
    exit();

    }


    if (empty($hire_date)) {
    header("Location: ../admin_portal_instructors.php?hire_date_error=$empty_field_error&$new_instructor_data");
    exit();

    }

    if (empty($password)) {
    header("Location: ../admin_portal_instructors.php?password_error=Enter a password&$new_instructor_data");
    exit();

    } 

    if (strlen($password) < 9) {
    header("Location: ../admin_portal_instructors.php?password_error=Password must be more then 8 characters&$new_instructor_data");
    exit();

    }

    if (empty($confirm_password)) {
    header("Location: ../admin_portal_instructors.php?confirm_password_error=Confirm the password&$new_instructor_data");
    exit();

    }


    if ($password != $confirm_password) {
    header("Location: ../admin_portal_instructors.php?last_name_error=Passwords do not match&$new_instructor_data");
    exit();

    }


    $new_instructor_insert_query = "INSERT INTO `instructors`(`instructor_id`, `first_name`, `last_name`, `other_names`, `email`, `phone_number`, `birth_date`, `gender`, `ssnit_number`, `salary`, `res_address`, `pass_word`, `course_id`, `hire_date`) VALUES (:instructor_id,:first_name,:last_name,:other_names,:email,:phone_number,:birth_date,:gender,:ssnit,:salary,:res_address,:pass_word,:course_id,:hire_date)";
    















} else {
    header("Location: ../admin_portal_instructors.php");
    exit();
}