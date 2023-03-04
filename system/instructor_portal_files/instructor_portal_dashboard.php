<?php
// initializing a session
session_start();


// Checking if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["email"]) && !isset($_SESSION['instructor_id'])){
    header("Location:" . ROOTDIR . "/index.php");
    exit();
}


    require_once 'intructor_portal_header.php';
    require_once '../database_connection/database_connection.php';


?>



<div class="main-body-wrapper">
    <div class="portal-body-wrapper">
        <div class="side-bar-wrapper">
            <div class="personal-details-wrapper">
                <div class="profile-pic-wrapper">
                   <img src="../images/uploads/<?= 'male_avatar.svg' ?>" alt="profile picture">
                </div>
                <div class="profile-name-wrapper">
                    <p><?= $_SESSION['last_name'] ?></p>
                    <span><i class="fas fa-circle" id="online"></i> Instructor</span>
                </div>
            </div>
            <div class="side-bar-functions-wrapper">
                <ul class="side-bar-links">
                    <li id="active-link">
                         <span><i class="fas fa-tachometer-alt"></i> <a href="instructor_portal_dashboard.php">Dashboard</a></span>
                    </li>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="instructor_portal_students.php">Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-dice"></i> <a href="instructor_portal_classes.php">Classes</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="instructor_portal_notice.php">Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="instructor_portal_exams.php">Exams &amp; Quizzes</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-check-double"></i> <a href="instructor_portal_assessment.php">Assessments</a></span></i>
                    </li>
                    <li>
                        <span> <i class="fas fa-cog"></i> Settings</span> 
                    </li>
                </ul>
            </div>
        </div>





        <div class="dashboah-content-wrapper">
            <div class="date-bar-wrapper">
                <p class="dashboard-text">
                    Dashboard
                </p>
                <p class="date-text"></p>
            </div>
            
        </div>





  </div>
</div>























<?php 
    require_once 'instructor_portal_footer.php';
 ?>