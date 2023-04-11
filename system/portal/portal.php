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
                    <li id="active-link">
                         <span><i class="fas fa-tachometer-alt"></i> <a href="portal.php"> Dashboard</a></span>
                    </li>
                    <li> 
                        <span> <i class="fas fa-users"></i> <a href="instructors.php"> Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="students.php"> Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-book-reader"></i> <a href="courses.php"> Courses</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-calendar-alt"></i> <a href="batches.php"> Batches</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-cedi-sign"></i> <a href="fees.php">Payment</a> </span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-book"></i> <a href="books.php"> Books</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="notice.php">Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
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
                    Dashboard
                </p>
                <p class="date-text"></p>
            </div>
            <div class="dashboard-card-wrapper">
                <div class="">
                    <p class="number">0</p>
                    <p class="text">INSTRUCTORS</p>
                </div>
                <div class="light-blue">
                    <p class="number">0</p>
                    <p class="text">STUDENTS</p>
                </div>
                <div class="green">
                    <p class="number">0</p>
                    <p class="text">COURSES</p>
                </div>
                <div class="red">
                    <p class="number">0</p>
                    <p class="text">BATCHES</p>
                </div>
                <div class="purple">
                    <p class="number">0</p>
                    <p class="text">CLASSES</p>
                </div>
                <div class="red">
                    <p class="number">0</p>
                    <p class="text">BOOKS IN STOCK</p>
                </div>
                <div class="green">
                    <p class="number">GHc 4050.00</p>
                    <p class="text">FEES OWED</p>
                </div>
                <div class="purple">
                    <p class="number"> GHc 8022.24</p>
                    <p class="text">FEES PAID</p>
                </div>
                 <div class="light-blue">
                    <p class="number">0</p>
                    <p class="text">FEMALE STUDENTS</p>
                </div>
                 <div class="">
                    <p class="number">0</p>
                    <p class="text">MALE STUDENTS</p>
                </div>
            </div>

            

            
        </div>





  </div>
</div>





















<?php 

    include_once('../includes/portal_footer.php');

?>