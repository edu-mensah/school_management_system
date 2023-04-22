<?php
// initializing a session
session_start();


// Checking if the user is already logged in, if no then redirect  to login page
if(!isset($_SESSION["last_name"]) && !isset($_SESSION['email'])){
    header("Location: ../../index.php");
    exit();
}


    include_once '../classes/Assessment.php';
    include_once '../classes/Batch.php';
    include_once '../classes/Book.php';
    include_once '../classes/Course.php';
    include_once '../classes/Instructor.php';
    include_once '../classes/Module.php';
    include_once '../classes/Notice.php';
    include_once '../classes/Payment.php';
    include_once '../classes/Student.php';
    include_once '../database_connection/connection_instance.php';


    // instructors
    $instructor = new Instructor($connection);
    $instructor_stmt = $instructor->view_all_instructors();
    $instructors = $instructor_stmt->fetchAll();
    $number_of_instructors = $instructor_stmt->rowCount();




    // students
    $student = new Student($connection);
    $student_stmt = $student->view_all_students();
    $students = $student_stmt->fetchAll();
    $number_of_students = $student_stmt->rowCount();
    $owed_fees = $student->view_fee_total();
    $female_students = $student->view_female_students();



    // courses
    $course = new Course($connection);
    $course_stmt = $course->view_all_courses();
    $courses = $course_stmt->fetchAll();
    $number_of_courses = $course_stmt->rowCount();


    // batches
    $batch = new Batch($connection);
    $batch_stmt = $batch->view_all_batches();
    $batches = $batch_stmt->fetchAll();
    $number_of_batches = $batch_stmt->rowCount();



     // payments
    $payment = new Payment($connection);
    $paid_fees = $payment->view_payment_total();

    // books
    $book = new Book($connection);
    $books = $book->view_all_books();
    $books_in_stock = $book->view_books_in_stock();


    // class times 
    $class_time_query = "SELECT * FROM class_times;";
    $stmt_class_time = $connection->prepare($class_time_query);
    $stmt_class_time->execute();
    $class_times = $stmt_class_time->fetchAll();
    


    




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../media/icons/favicon.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= strtoupper($_SESSION['account_type']) ?> PORTAL</title>
    <!-- custom styling -->
    <link rel="stylesheet" href="../css/portal_header.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/portal.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/button_bar.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/settings.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/instructors.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/students.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/courses.css?v=<?= time();?>">
    <link rel="stylesheet" href="../css/batches.css?v=<?= time();?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>
<body>
    

    <div class="portal-head-wrapper">
        <h3 class="account_type-text"> <?= strtoupper($_SESSION['account_type']) ?> PORTAL</h3>
        <div class="logout-wrapper">
            <a href="../configuration/logout.php"> <i class="fas fa-arrow-circle-right"></i> LOGOUT</a>
        </div>
    </div>