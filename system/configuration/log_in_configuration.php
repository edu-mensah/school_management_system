<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location: ../portal/dashboard.php");
    exit();
    
}




include_once('../classes/Log_in.php');
include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');

if (isset($_POST['submit'])) {
    $email = validate_text_input($_POST['email']);
    $password = validate_text_input($_POST['password']);
    $table = ['students','employees'];




     // Error message variables
    $user_data = 'email=' . $email;

    
    if (empty($email)) {
        header("Location: ../../index.php?email_error=Please enter your email or ID.&$user_data");
        exit();
    }


    if (empty($password)) {
       header("Location: ../../index.php?password_error=Please enter your password.&$user_data");
       exit();
    }






    $login = new Login($connection,$email,$password);

    $stmt= $login->get_user_details("students","student_id");


    if ($stmt->rowCount() > 0) {
        $student_data = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!password_verify($password,$student_data['pass_word'])) {
                header("Location: ../../index.php?password_error=Wrong password.&$user_data");
                exit();
            }
        

            session_start();
            //  student personal details
            $_SESSION['user_id'] = $student_data['student_id'];
            $_SESSION['first_name'] = $student_data['first_name'];
            $_SESSION['last_name'] = $student_data['last_name'];
            $_SESSION['other_names'] = $student_data['others_names'];
            $_SESSION['email'] = $student_data['email'];
            $_SESSION['phone_number'] = $student_data['phone_number'];
            $_SESSION['birth_date'] = $student_data['birth_date'];
            $_SESSION['gender'] = $student_data['gender'];
            $_SESSION['res_address'] = $student_data['res_address'];
            $_SESSION['guardian_name'] = $student_data['guardian_name'];
            $_SESSION['batch_id'] = $student_data['batch_id'];
            $_SESSION['class_id'] = $student_data['class_id'];
            $_SESSION['course_id']= $student_data['course_id'];
            $_SESSION['profile_picture'] = $student_data['profile_picture'];
            $_SESSION['account_type']= "student";



            header("Location: ../portal/portal.php");
            exit();


    }


    $stmt = $login->get_user_details('instructors','instructor_id');


    if ($stmt->rowCount() > 0) {
        $instructor_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($password,$instructor_data['pass_word'])) {
                header("Location: ../../index.php?password_error=Wrong password.&$user_data");
                exit();
            }


             session_start();
            //  instructor personal details
            $_SESSION['user_id'] = $instructor_data['instructor_id'];
            $_SESSION['first_name'] = $instructor_data['first_name'];
            $_SESSION['last_name'] = $instructor_data['last_name'];
            $_SESSION['other_names'] = $instructor_data['other_names'];
            $_SESSION['email'] = $instructor_data['email'];
            $_SESSION['phone_number'] = $instructor_data['phone_number'];
            $_SESSION['birth_date'] = $instructor_data['birth_date'];
            $_SESSION['gender'] = $instructor_data['gender'];
            $_SESSION['res_address'] = $instructor_data['res_address'];
            $_SESSION['course_id'] = $instructor_data['course_id'];
            $_SESSION['profile_picture'] = $instructor_data['profile_picture'];
            $_SESSION['account_type'] = "instructor";





            header("Location: ../portal/portal.php");
            exit();


    }



    $stmt = $login->get_user_details('administrators','admin_id');


    if ($stmt->rowCount() > 0) {
        $admin_data = $stmt->fetch(PDO::FETCH_ASSOC);
        // !password_verify($password,$admin_data['pass_word'])

        if (!password_verify($password,$admin_data['pass_word'])) {
                header("Location: ../../index.php?password_error=Wrong password.&$user_data");
                exit();
            }


             session_start();
            //  admin personal details
            $_SESSION['user_id'] = $admin_data['admin_id'];
            $_SESSION['first_name'] = $admin_data['first_name'];
            $_SESSION['last_name'] = $admin_data['last_name'];
            $_SESSION['other_names'] = $admin_data['others_names'];
            $_SESSION['email'] = $admin_data['email'];
            $_SESSION['phone_number'] = $admin_data['phone_number'];
            $_SESSION['birth_date'] = $admin_data['birth_date'];
            $_SESSION['gender'] = $admin_data['gender'];
            $_SESSION['res_address'] = $admin_data['res_address'];
            $_SESSION['profile_picture'] = $admin_data['profile_picture'];
            $_SESSION['account_type'] = "administrator";





            header("Location: ../portal/portal.php");
            exit();


    }




      ############## The user id  or the email did match any data ##################
    header("Location: ../../index.php?email_error=Invalid email or ID.&$user_data");
    exit();







} else{
    header("Location: ../../index.php");
    exit();
}