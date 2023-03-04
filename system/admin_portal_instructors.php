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
                    <img src="images/uploads/<?= 'male_avatar.svg' ?>" alt="profile picture">
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
                    <li id="active-link"> 
                        <span> <i class="fas fa-users"></i> <a href="admin_portal_instructors.php"> Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="admin_portal_students.php"> Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-clone"></i> <a href="admin_portal_courses.php">Courses</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-calendar-alt"></i> <a href="admin_portal_batches.php"> Batches</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
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
                    Instructors
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->


            <div class="button-bar-wrapper">
                <a href="#instructor-form"><i class="fas fa-plus"></i> Add Instructor</a>
            </div>



            <!--  -->




            <div class="list-of-instructors-wrapper">
                <div class="list-header-wrapper">
                    
                </div>
            </div>
            
            <div class="form-main-wrapper" id="instructor-form">
                <div class="form-header-wrapper">
                    <h2>Intructor Form</h2>
                    <p>All fields are required</p>
                </div>
                <form  action="includes_/intructor_register_config.php" method="post">
                    <div class="form-left-section-wrapper">
                        <div class="form-item">
                        <input type="text" name="instructor_id" autocomplete="off" placeholder="Instructor ID">
                        <span><i class="fas fa-star" ></i></span>
                        </div>

                         <div class="form-item">
                        <input type="text" name="first_name" autocomplete="off" placeholder="First Name">
                        <span><i class="fas fa-user-alt" ></i></span>
                        </div>

                         <div class="form-item">
                        <input type="text" name="last_name" autocomplete="off" placeholder="Last Name">
                        <span><i class="fas fa-user-alt" ></i></span>
                        </div>


                         <div class="form-item">
                        <input type="text" name="other_names" autocomplete="off" placeholder="Other Names (optional)">
                        <span><i class="fas fa-user-alt" ></i></span>
                        </div>

                         <div class="form-item">
                        <input type="text" name="email" autocomplete="off" placeholder="example@example.com">
                        <span><i class="fas fa-envelope" ></i></span>
                        </div>

                        <div class="form-item">
                        <input type="text" name="phone_number" autocomplete="off" placeholder="0545458752">
                        <span><i class="fas fa-phone" ></i></span>
                        </div>
                        

                        <div class="form-item">
                        <input type="text" name="birth_date" autocomplete="off" placeholder="Date of Birth (1995-05-20)">
                        <span><i class="fas fa-calendar" ></i></span>
                        </div>


                        <div class="form-item">
                        <input type="text" name="res_address" autocomplete="off" placeholder="Residential Address">
                        <span><i class="fas fa-map-marker-alt" ></i></span>
                        </div>
                        

                        <div class="form-item">
                        <input type="text" name="hire_date" autocomplete="off" placeholder=" Hire Date (2014-11-26)">
                        <span><i class="fas fa-calendar" ></i></span>
                        </div>
                    </div>

                    <!--  -->
                    <div class="form-right-section-wrapper">
                        

                         <div class="form-item">
                        <input type="text" name="ssnit_number" autocomplete="off" placeholder="SSNIT Number">
                        <span><i class="fas fa-user-alt" ></i></span>
                        </div>

                         <div class="form-item">
                        <input type="text" name="salary" autocomplete="off" placeholder="Salary">
                        <span><i class="fas fa-cedi-sign" ></i></span>
                        </div>


                        <div class="form-item">
                            <select name="gender" id="">
                                <option value="">Select  gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        <span><i class="fas fa-mars-double" ></i></span>
                        </div>
                        

                         <div class="form-item">
                        <input type="password" name="password" autocomplete="off" placeholder="Password">
                        <span><i class="fas fa-lock" ></i></span>
                        </div>

                        <div class="form-item">
                        <input type="password" name="confirm_password" autocomplete="off" placeholder="Confirm Password">
                        <span><i class="fas fa-phone" ></i></span>
                        </div>


                        <div class="form-item">
                            <select>
                                <option value="">Select a course</option>
                                <option value="">GRWD</option>
                                <option value="">SE</option>
                                <option value="">DBT</option>
                                <option value="">HWR</option>
                            </select>
                            <span><i class="fas fa-bookmark" ></i></span>
                        </div>


                        <div class="form-item">
                            <input type="file" name="image" id="">
                        <span><i class="fas fa-upload" ></i></span>
                        </div>

                        <div class="form-item" id="form-submit">
                            <input type="submit" name="register" value="REGISTER">
                        </div>

                    </div>
                    </div>
                </form>
            </div>

        </div>

        





  </div>
</div>



    <?php 
    require_once 'admin_portal_footer.php';
    ?>