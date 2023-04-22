<?php


include_once('../database_connection/connection_instance.php');
include_once('../classes/Student.php');
include_once('../functions/functions.php');


$student = new Student($connection);


if (isset($_POST['add_student'])) {
    
    $student_id  = generate_account_id("stu");
    $last_name = validate_text_input($_POST['last_name']);
    $first_name = validate_text_input($_POST['first_name']);
    $other_names = validate_text_input($_POST['other_names']);
    $email = validate_text_input($_POST['email']);
    $phone_number = validate_text_input($_POST['phone_number']);
    $birth_date = format_date(validate_text_input($_POST['birth_date']));
    $gender = validate_text_input($_POST['gender']);
    $guardian_name = validate_text_input($_POST['guardian_name']);
    $guardian_contact = validate_text_input($_POST['guardian_contact']);
    $course_id = $_POST['course_id'];
    $res_address = validate_text_input($_POST['res_address']);
    $batch_id = $_POST['batch_id'];


    $picture_name = $_FILES['profile_picture']['name'];
    $picture_temp_name = $_FILES['profile_picture']['tmp_name'];
    $picture_size = $_FILES['profile_picture']['size'];
    $picture_type = $_FILES['profile_picture']['type'];

    $user_data = 'last_name=' . $last_name . '&first_name=' . $first_name . '&other_names=' . $other_names . '&email=' . $email . '&phone_number=' . $phone_number . '&gender=' . $gender . '&res_address=' . $res_address . '&guardian_contact=' . $guardian_contact . '&guardian_name=' . $guardian_name;


 


     if (empty($first_name)) {
        header("Location: ../portal/students.php?first_name_error=Fisrt Name is required.&$user_data");
        exit();
    }


    if (empty($last_name)) {
        header("Location: ../portal/students.php?last_name_error=Last Name is required.&$user_data");
        exit();
    }


    if (empty($other_names)) {
        $other_names = NULL;
    }

    if (empty($email)) {
        header("Location: ../portal/students.php?email_error=Email is required.&$user_data");
        exit();
    }

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location: ../portal/students.php?email_error=Invalid email.&$user_data");
        exit();
    }

    $select_query = "SELECT * FROM students WHERE email = :email;";
    $stmt_email = $connection->prepare($select_query);
    $stmt_email->execute(['email' => $email]);

    if ($stmt_email->rowCount() > 0) {
        header("Location: ../portal/students.php?email_error=This email is taken.&$user_data");
        exit();        
    }

    if (empty($phone_number)) {
        header("Location: ../portal/students.php?phone_number_error=Phone Number is required.&$user_data");
        exit();
    }

    if (empty($birth_date)) {
        header("Location: ../portal/students.php?birth_date_error=Birth date is required.&$user_data");
        exit();
    }


    if (empty($guardian_name)) {
        header("Location: ../portal/students.php?guardian_name_error=Guardian name is required.&$user_data");
        exit();
    }

    if (empty($guardian_contact)) {
        header("Location: ../portal/students.php?guardian_contact_error=Guardian contact is required.&$user_data");
        exit();
    }


    if (empty($gender)) {
        header("Location: ../portal/students.php?gender_error=Gender is required.&$user_data");
        exit();
    }

    if (empty($course_id)) {
        $course_id = NULL;
    }

    if (empty($batch_id)) {
        $batch_id = NULL;
    }

    if (empty($picture_name)) {
        header("Location: ../portal/students.php?picture_error=Picture is required.&$user_data");
        exit();
    }




    $allowed_ext = ['jpeg','jpg','png'];
    $picture_ext = explode('.',$picture_name);
    $picture_ext = strtolower(end($picture_ext));

 
    if (!(in_array($picture_ext,$allowed_ext))) {
        header("Location: ../portal/students.php?picture_error=Picture type not allowed&$user_data");
        exit();
    }

    if (($_POST['profile_picture']['size'] > 0)) {
        header("Location: ../portal/students.php?picture_error=Picture error. please try again&$user_data");
        exit();
    }










    $new_picture_name = $student_id . "." . $picture_ext;
    $picture_folder = __DIR__ . '../media/profile_pictures/' . $new_picture_name;
    move_uploaded_file($picture_temp_name,$picture_folder);




    $add_student = $student->add_student($student_id,$last_name,$first_name,$other_names,$email,$phone_number,$birth_date,$gender,$res_address,$course_id,$new_picture_name,$guardian_name,$guardian_contact,$batch_id);



    if($add_student){
        header("Location: ../portal/students.php?success=Student added");
        exit();
    } elseif ($add_student === -1) {
        header("Location: ../portal/students.php?error=Something went wrong. Please try again&$user_data");
        exit();
    }









} else {
    header("Location: ../portal/students.php");
    exit();
}