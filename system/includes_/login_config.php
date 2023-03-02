<?php
// initializing a session
session_start();

define("ROOTDIR", dirname("/school_management_system/system"));
// define("ROOTDIR", "school_management_system");

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
require_once 'database_connection.php';
// all function
require_once 'functions.php';
// class
require_once 'classes/loginClass.php';


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

/*
         
        //  getting the student course
         $course_query = "SELECT * FROM `courses` WHERE couse_id = :course_id";
         $student_course_data = $DatabaseConnection->prepare($course_query);
         $student_course_data->execute(['course_id' => $student_data['course_id']]);

        //  fetch data
        $std_course = $student_course_data->fetch(PDO::FETCH_ASSOC);

        

        //  getting the student instructor
         $instructor_query = "SELECT  * FROM `instructors` WHERE couse_id = :course_id";
         $student_instructor_data = $DatabaseConnection->prepare($instructor_query);
         $student_instructor_data->execute(['course_id' => $student_data['course_id']]);

        //  fetch data
        $std_instructor = $student_instructor_data->fetch(PDO::FETCH_ASSOC);


         


        // getting student asssessments
        $assessment_query = "SELECT  * FROM `assessments` WHERE student_id = :student_id";
         $student_assessment_data = $DatabaseConnection->prepare($assessment_query);
         $student_assessment_data->execute(['student_id' => $student_data['student_id']]);

        //  fetch data
        $std_assessment = $student_assessment_data->fetch(PDO::FETCH_ASSOC);



        // getting student assigned books
         $assigned_query = "SELECT `book_id`, `assigned_date` FROM `assigned_books` WHERE student_id = :student_id";
         $student_assigned_data = $DatabaseConnection->prepare($assigned_query);
         $student_assigned_data->execute(['student_id' => $student_data['student_id']]);

        //  fetch data
        $std_assigned = $student_assigned_data->fetch(PDO::FETCH_ASSOC);



        // getting student assigned books title
        $book_query = "SELECT * FROM `books` WHERE book_id = :book_id";
         $student_book_data = $DatabaseConnection->prepare($book_query);
         $student_book_data->execute(['book_id' => $std_assigned['book_id']]);

        //  fetch data
        $std_book = $student_book_data->fetch(PDO::FETCH_ASSOC);




        // getting student class
        $class_query = "SELECT * FROM `class` WHERE class_id = :class_id";
         $student_class_data = $DatabaseConnection->prepare($class_query);
         $student_class_data->execute(['class_id' => $student_data['class_id']]);

        //  fetch data
        $std_class = $student_class_data->fetch(PDO::FETCH_ASSOC);



        // getting student batch
        $batch_query = "SELECT * FROM `batches` WHERE batch_id = :batch_id";
         $student_batch_data = $DatabaseConnection->prepare($batch_query);
         $student_batch_data->execute(['batch_id' => $student_data['batch_id']]);

        //  fetch data
        $std_book = $student_book_data->fetch(PDO::FETCH_ASSOC);

*/
        
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


    $instructor_user_select_query = "SELECT * FROM `instructors` WHERE email = :email || institutional_id = :institutionalId";

    // Statement instructor
    $stmt_instructor = $DatabaseConnection->prepare($instructor_user_select_query);
    $stmt_instructor->execute(['email' => $email_or_id, 'institutionalId' => $email_or_id]);


    if ($stmt_instructor->rowCount() > 0) {
        $instructor_data = $stmt_instructor->fetch(PDO::FETCH_ASSOC);

        $check_password = password_verify($password,$instructor_data['pass_word']);

        if (!$check_password) {
              header("Location:" . ROOTDIR . "/index.php?error=Wrong password.&$user_data");
                 exit();
         } 


         session_start();
        //  instructor personal details
         $_SESSION['instructor_id'] = $instructor_data['institutional_id'];
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
        //  $_SESSION['class_id'] = $instructor_data['class_id'];
        //  $_SESSION['course_id']= $instructor_data['course_id'];




        header("Location:" . ROOTDIR . "/system/instructor_portal_dashboard.php");
        exit();
    }
    $stmt_instructor = null;






    // #########################################  Admin Login config ########################

    $admin_user_select_query = "SELECT * FROM `administrators` WHERE email = :email || institutional_id = :institutionalId";

    $stmt_admin = $DatabaseConnection->prepare($admin_user_select_query);
    $stmt_admin->execute(['email' => $email_or_id, 'institutionalId' => $email_or_id]);


    if ($stmt_admin->rowCount() > 0) {
        $admin_data = $stmt_admin->fetch(PDO::FETCH_ASSOC);

        $check_password = $admin_data['pass_word'] == $password;   //password_verify($password,$admin_data['pass_word']);

        if (!$check_password) {
              header("Location:" . ROOTDIR . "/index.php?error=Wrong password.&$user_data");
                 exit();
         }


          session_start();
        //  Admin personal details
         $_SESSION['institutional_id'] = $admin_data['institutional_id'];
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