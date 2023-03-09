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
    $student_data = $stmt_student->fetch(PDO::FETCH_ASSOC);


// ########################
    $male_student_query = "SELECT * FROM `students` WHERE gender = 'male'";
    $stmt_male_student = $DatabaseConnection->prepare($male_student_query);
    $stmt_male_student->execute();
    $number_of_male_students = $stmt_male_student->rowCount();

// ########################
    $female_student_query = "SELECT * FROM `students` WHERE gender = 'female'";
    $stmt_female_student = $DatabaseConnection->prepare($female_student_query);
    $stmt_female_student->execute();
    $number_of_female_students = $stmt_female_student->rowCount();
    


// Instructors Data
    $instructor_user_select_query = "SELECT * FROM `instructors`";
// Statement Instructor
    $stmt_instructor = $DatabaseConnection->prepare($instructor_user_select_query);
    $stmt_instructor->execute();
    $number_of_instructors = $stmt_instructor->rowCount();


    // courses Data
    $course_user_select_query = "SELECT * FROM `courses`";
// Statement courses
    $stmt_course = $DatabaseConnection->prepare($course_user_select_query);
    $stmt_course->execute();
    $number_of_courses = $stmt_course->rowCount();


    // Batches Data
    $batch_user_select_query = "SELECT * FROM `batches`";
// Statement Instructor
    $stmt_batch = $DatabaseConnection->prepare($batch_user_select_query);
    $stmt_batch->execute();
    $number_of_batches = $stmt_batch->rowCount();



    // classes Data
    $class_user_select_query = "SELECT * FROM `classes`";
// Statement Instructor
    $stmt_class = $DatabaseConnection->prepare($class_user_select_query);
    $stmt_class->execute();
    $number_of_classes = $stmt_class->rowCount();

    

     // books Data
    $book_user_select_query = "SELECT * FROM `books`";
// Statement Instructor
    $stmt_book = $DatabaseConnection->prepare($book_user_select_query);
    $stmt_book->execute();
    $number_of_books = $stmt_book->rowCount();
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
                    <li id="active-link">
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
                    <li>
                         <span><i class="fas fa-dice"></i> <a href="admin_portal_classes.php"> Classes</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-cedi-sign"></i> <a href="admin_portal_fees.php"> Fees and Payment</a> </span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-book"></i> <a href="admin_portal_books.php"> Books</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="admin_portal_notice.php">Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
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
                    Dashboard
                </p>
                <p class="date-text"></p>
            </div>
            <div class="dashboard-card-wrapper">
                <div class="">
                    <p class="number"><?= $number_of_instructors ?></p>
                    <p class="text">INSTRUCTORS</p>
                </div>
                <div class="light-blue">
                    <p class="number"><?= $number_of_students ?></p>
                    <p class="text">STUDENTS</p>
                </div>
                <div class="green">
                    <p class="number"><?= $number_of_courses ?></p>
                    <p class="text">COURSES</p>
                </div>
                <div class="red">
                    <p class="number"><?= $number_of_batches ?></p>
                    <p class="text">BATCHES</p>
                </div>
                <div class="purple">
                    <p class="number"><?= $number_of_classes ?></p>
                    <p class="text">CLASSES</p>
                </div>
                <div class="red">
                    <p class="number"><?= $number_of_books ?></p>
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
                    <p class="number"><?=  $number_of_female_students ?></p>
                    <p class="text">FEMALE STUDENTS</p>
                </div>
                 <div class="">
                    <p class="number"><?=  $number_of_male_students ?></p>
                    <p class="text">MALE STUDENTS</p>
                </div>
            </div>

            <div class="student-and-instructor-list">
                <div class="instructor-list">
                    <h2>INSTRUCTORS</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>INSTRUCTOR ID</th>
                                <th>FULL NAME</th>
                                <th>EMIAL</th>
                                <th>PHONE</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>in20001</td>
                            <td>Edu Mensah</td>
                            <td>e@gmail.com</td>
                            <td>0245367895</td>
                        </tr>
                        <tr>
                            <td>in20011</td>
                            <td>Kwame Romio</td>
                            <td>kwame@gmail.com</td>
                            <td>0245364495</td>
                        </tr>
                        <tr>
                            <td>in20021</td>
                            <td>Kofi Blay</td>
                            <td>kwame@yahoo.com</td>
                            <td>0545364495</td>
                        </tr>
                        <tr>
                            <td>in20002</td>
                            <td>Kwame Romio</td>
                            <td>k@gmail.com</td>
                            <td>0245364495</td>
                        </tr>
                    </table>
                </div>
                <div class="student-list">
                    <h2>STUDENTS</h2>
                    <table>
                    <thead>
                        <tr>
                            <th>STUDENT ID</th>
                            <th>FULL NAME</th>
                            <th>EMIAL</th>
                            <th>PHONE</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>st20001</td>
                        <td>Edu Mensah</td>
                        <td>e@gmail.com</td>
                        <td>0245367895</td>
                    </tr>
                    <tr>
                        <td>st20011</td>
                        <td>Kwame Romio</td>
                        <td>kwame@gmail.com</td>
                        <td>0245364495</td>
                    </tr>
                    <tr>
                        <td>st20021</td>
                        <td>Kofi Blay</td>
                        <td>kwame@yahoo.com</td>
                        <td>0545364495</td>
                    </tr>
                    <tr>
                        <td>st20002</td>
                        <td>Kwame Romio</td>
                        <td>k@gmail.com</td>
                        <td>0245364495</td>
                    </tr>
                </table>
                </div>
            </div>

            
        </div>





  </div>
</div>



    <?php 
    require_once 'admin_portal_footer.php';
    ?>