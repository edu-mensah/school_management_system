<?php 

include_once('../includes/portal_header.php');

?>


<div class="main-body-wrapper">
    <div class="portal-body-wrapper">
        <div class="side-bar-wrapper">
            <div class="personal-details-wrapper">
                <div class="profile-pic-wrapper">
                   <img src="../media/profile_pictures/<?= $_SESSION['profile_picture'] ?>" alt="profile picture">
                </div>
                <div class="profile-name-wrapper">
                    <p><?= $_SESSION['last_name'] ?></p>
                    <span> <?= ucfirst($_SESSION['account_type']) ?></span>
                </div>
            </div>
            <div class="side-bar-functions-wrapper">
                <ul class="side-bar-links">
                    <li>
                         <span><i class="fas fa-tachometer-alt"></i> <a href="portal.php"> Dashboard</a></span>
                    </li>
                    <?php if(strtolower($_SESSION['account_type']) == 'administrator' || strtolower($_SESSION['account_type']) == 'student') { ?>
                    <li> 
                        <span> <i class="fas fa-users"></i> <a href="instructors.php"> Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="students.php"> Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-book-reader"></i> <a href="courses.php">Courses & Modules</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-calendar-alt"></i> <a href="batches.php"> Batches</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php if(strtolower($_SESSION['account_type']) == 'student' || strtolower($_SESSION['account_type']) == 'administrator') { ?>
                    <li>
                         <span><i class="fas fa-cedi-sign"></i> <a href="payments.php">Payments</a> </span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <?php if(strtolower($_SESSION['account_type']) == 'administrator' || strtolower($_SESSION['account_type']) == 'student') { ?>
                    <li>
                         <span><i class="fas fa-book"></i> <a href="books.php"> Books</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="notice.php"> Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li id="active-link">
                         <span><i class="fas fa-percent"></i> <a href="exams.php"> Exams and Quiz</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-check-double"></i> <a href="assessments.php"> Assessments</a></span></i>
                    </li>
                    <li>
                        <span> <i class="fas fa-cog"></i> <a href="settings.php"> Settings</a></span> 
                    </li>
                </ul>
            </div>
        </div>




         <div class="dashboah-content-wrapper">
            <div class="date-bar-wrapper">
                <p class="dashboard-text">
                    Exams and Quiz
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->
            <div class="buttons-wrapper">
                <span class="set-exams">
                    <i class="fas fa-plus" ></i>
                    SET EXAMS/QUIZ
                </span>
                <span class="take-exams">
                    <i class="fas fa-edit" ></i>
                    TAKE EXAMS/QUIZ 
                </span>
            </div>


            <!--  -->

          

            <!--  -->

            
            
            

        </div>


        


        





  </div>
</div>




<?php
    include_once('../includes/portal_footer.php');
?>