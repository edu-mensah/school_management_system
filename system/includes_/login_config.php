<?php
// initializing a session
session_start();

define("ROOTDIR", dirname("/school_management_system/system"));

// Checking if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if (isset($_SESSION['student_id'])) {
    header("Location: ./system/student_portal.php");
    exit();
    } elseif ($_SESSION['institutional_id'] && $_SESSION['course_id']) {
        header("Location:" . ROOTDIR . "/system/instructor_portal.php");
        exit();
    } else {
        header("Location:"  . ROOTDIR . "./system/admin_portal.php");
        exit();
    }
    
}


// the DBconnection
require_once '../database_connection/database_connection.php';
// all function
require_once '../functions/functions.php';
// class
require_once '../classes/loginClass.php';


// Defining variables and initializing with empty values
$email_or_id = $password = "";

// Sanitizing Data
if (isset($_POST['submit'])) {
    $email_or_id = $_POST['email'];
    $password = $_POST['password'];


    $loginData = new Login($email_or_id, $password);



    // sanitized data
    $email_or_id = $loginData->sanitizeEmailInput();
    $password = $loginData->sanitizePasswordInput();



     // Error message variables
    $user_data = 'email=' . $loginData->getEmail();




    
    if ($loginData->isEmailEmpty()) {
        header("Location:" . ROOTDIR . "/index.php?email_error=Please enter your email or ID.&$user_data");
        exit();
    }


    if ($loginData->isPasswordEmpty()) {
       header("Location:" . ROOTDIR . "/index.php?error=Please enter your password.&$user_data");
       exit();
    }


   
   










    // #########################################  Student Login config ########################

    // Making database fetch
    $student_user_select_query = "SELECT * FROM `students` WHERE email = :email || student_id = :studentId";
    
    // Statement student
    $stmt_student = $DatabaseConnection->prepare($student_user_select_query);
    $stmt_student->execute(['email' => $email_or_id, 'studentId' => $email_or_id]);


    if ($stmt_student->rowCount() > 0) {
        $student_data = $stmt_student->fetch(PDO::FETCH_ASSOC);

        $check_password = password_verify($password,$student_data['pass_word']);

        if (!$check_password) {
              header("Location:" . ROOTDIR . "/index.php?error=Wrong password.&$user_data");
                 exit();
         } 


        
         session_start();
        //  student personal details
         $_SESSION['student_id'] = $student_data['student_id'];
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


        header("Location:" . ROOTDIR . "/system/student_portal_dashborad.php");
        exit();
    }
    $stmt_student = null;






    // #########################################  Instructor Login config ########################


    $instructor_user_select_query = "SELECT * FROM `instructors` WHERE email = :email || instructor_id = :instructorId";

    // Statement instructor
    $stmt_instructor = $DatabaseConnection->prepare($instructor_user_select_query);
    $stmt_instructor->execute(['email' => $email_or_id, 'instructorId' => $email_or_id]);


    if ($stmt_instructor->rowCount() > 0) {
        $instructor_data = $stmt_instructor->fetch(PDO::FETCH_ASSOC);

        $check_password = password_verify($password,$instructor_data['pass_word']);

        if (!$check_password) {
              header("Location:" . ROOTDIR . "/index.php?error=Wrong password.&$user_data");
                 exit();
         } 


         session_start();
        //  instructor personal details
         $_SESSION['instructor_id'] = $instructor_data['instructor_id'];
         $_SESSION['first_name'] = $instructor_data['first_name'];
         $_SESSION['last_name'] = $instructor_data['last_name'];
         $_SESSION['other_names'] = $instructor_data['others_names'];
         $_SESSION['email'] = $instructor_data['email'];
         $_SESSION['phone_number'] = $instructor_data['phone_number'];
         $_SESSION['birth_date'] = $instructor_data['birth_date'];
         $_SESSION['gender'] = $instructor_data['gender'];
         $_SESSION['res_address'] = $instructor_data['res_address'];
         $_SESSION['ssnit_number'] = $instructor_data['ssnit_number'];
         $_SESSION['course_id'] = $instructor_data['course_id'];
        




        header("Location:" . ROOTDIR . "/system/instructor_portal_dashboard.php");
        exit();
    }
    $stmt_instructor = null;






    // #########################################  Admin Login config ########################

    $admin_user_select_query = "SELECT * FROM `administrators` WHERE email = :email || admin_id = :adminId";

    $stmt_admin = $DatabaseConnection->prepare($admin_user_select_query);
    $stmt_admin->execute(['email' => $email_or_id, 'adminId' => $email_or_id]);


    if ($stmt_admin->rowCount() > 0) {
        $admin_data = $stmt_admin->fetch(PDO::FETCH_ASSOC);

        $check_password = $admin_data['pass_word'] == $password;   //password_verify($password,$admin_data['pass_word']);

        if (!$check_password) {
              header("Location:" . ROOTDIR . "/index.php?error=Wrong password.&$user_data");
                 exit();
         }


          session_start();
        //  Admin personal details
         $_SESSION['admin_id'] = $admin_data['admin_id'];
         $_SESSION['first_name'] = $admin_data['first_name'];
         $_SESSION['last_name'] = $admin_data['last_name'];
         $_SESSION['other_names'] = $admin_data['others_names'];
         $_SESSION['email'] = $admin_data['email'];
         $_SESSION['phone_number'] = $admin_data['phone_number'];
         $_SESSION['birth_date'] = $admin_data['birth_date'];
         $_SESSION['gender'] = $admin_data['gender'];
         $_SESSION['res_address'] = $admin_data['res_address'];
         $_SESSION['ssnit_number'] = $admin_data['ssnit_number'];




        header("Location:" . ROOTDIR . "/system/admin_portal_dashboard.php");
        exit();
    }

    $stmt_admin = null;








    //  ############## The user id  or the email did match any data ##################
    header("Location:" . ROOTDIR . "/index.php?email_error=Invalid email or ID.&$user_data");
    exit();


    
} else {
    header("Location:" . ROOTDIR . "/index.php");
    exit();
}