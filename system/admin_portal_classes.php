<?php
// initializing a session
session_start();


// Checking if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["email"]) && !isset($_SESSION['admin_id'])){
    header("Location:" . ROOTDIR . "/index.php");
    exit();
}

    require_once 'admin_portal_header.php';
    require_once 'database_connection/database_connection.php';




// Students Data
    $student_user_select_query = "SELECT * FROM `students`";
// Statement student
    $stmt_student = $DatabaseConnection->prepare($student_user_select_query);
    $stmt_student->execute();
    $number_of_students = $stmt_student->rowCount();


// Instructors Data
    $instructor_user_select_query = "SELECT * FROM `instructors`";
// Statement Instructor
    $stmt_instructor = $DatabaseConnection->prepare($instructor_user_select_query);
    $stmt_instructor->execute();
    $number_of_instructors = $stmt_instructor->rowCount();


    // courses Data
    $course_user_select_query = "SELECT * FROM `instructors`";
// Statement courses
    $stmt_course = $DatabaseConnection->prepare($course_user_select_query);
    $stmt_course->execute();
    $number_of_courses = $stmt_course->rowCount();


    // Batches Data
    $batch_user_select_query = "SELECT * FROM `instructors`";
// Statement Instructor
    $stmt_batch = $DatabaseConnection->prepare($batch_user_select_query);
    $stmt_batch->execute();
    $number_of_batches = $stmt_batch->rowCount();



    // classes Data
    $class_user_select_query = "SELECT * FROM `instructors`";
// Statement Instructor
    $stmt_class = $DatabaseConnection->prepare($class_user_select_query);
    $stmt_class->execute();
    $number_of_classes = $stmt_class->rowCount();

    
?>


<div class="main-body-wrapper">
    <div class="portal-body-wrapper">
        <div class="side-bar-wrapper">
            <div class="personal-details-wrapper">
                <div class="profile-pic-wrapper">
                    <img src="images/uploads/<?= $_SESSION['admin_id'] ?>.jpg" alt="profile picture">
                </div>
                <div class="profile-name-wrapper">
                    <p><?= $_SESSION['last_name'] ?></p>
                    <span><i class="fas fa-circle" id="online"></i> Admin</span>
                </div>
            </div>
            <div class="side-bar-functions-wrapper">
                <ul class="side-bar-links">
                    <li>
                         <span><i class="fas fa-tachometer-alt"></i> <a href="admin_portal_dashboard.php"> Dashboard</a></span>
                    </li>
                    <li> 
                        <span> <i class="fas fa-users"></i> <a href="admin_portal_instructors.php"> Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="admin_portal_students.php"> Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-clone"></i> <a href="admin_portal_courses.php"> Courses</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-calendar-alt"></i> <a href="admin_portal_batches.php"> Batches</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li id="active-link">
                         <span><i class="fas fa-dice"></i> <a href="admin_portal_classes.php"> Classes</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-cedi-sign"></i> <a href="admin_portal_fees.php"> Fees and Payments</a> </span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-book"></i> <a href="admin_portal_books.php"> Books</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="admin_portal_notice.php"> Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-check-double"></i> <a href="admin_portal_assessment.php"> Assessments</a></span></i>
                    </li>
                    <li>
                        <span> <i class="fas fa-cog"></i> <a href="admin_portal_settings.php"> Settings</a></span> 
                    </li>
                </ul>
            </div>
        </div>


        <div class="dashboah-content-wrapper">
            <div class="date-bar-wrapper">
                <p class="dashboard-text">
                    Classes
                </p>
                <p class="date-text"></p>
            </div>
        </div>




        





  </div>
</div>



    <?php 
    require_once 'admin_portal_footer.php';
    ?>