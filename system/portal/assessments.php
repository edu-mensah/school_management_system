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
                    <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
                    <li> 
                        <span> <i class="fas fa-users"></i> <a href="instructors.php"> Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <?php if(strtolower($_SESSION['account_type']) == 'instructor' || strtolower($_SESSION['account_type']) == 'administrator') { ?>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="students.php"> Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li>
                         <span> <i class="fas fa-book-reader"></i> <a href="courses.php"> Courses & Modules</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php if(strtolower($_SESSION['account_type']) == 'administrator' || strtolower($_SESSION['account_type']) == 'instructor') { ?>
                    <li>
                         <span> <i class="fas fa-calendar-alt"></i> <a href="batches.php"> Batches</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <?php if(strtolower($_SESSION['account_type']) == 'student' || strtolower($_SESSION['account_type']) == 'administrator') { ?>
                    <li>
                         <span><i class="fas fa-cedi-sign"></i> <a href="payments.php">Payments</a> </span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
                    <li>
                         <span><i class="fas fa-book"></i> <a href="books.php"> Books</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="notice.php"> Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php if(strtolower($_SESSION['account_type']) == 'student' || strtolower($_SESSION['account_type']) == 'instructor') { ?>
                    <li>
                         <span><i class="fas fa-percent"></i> <a href="exams.php"> Exams and Quiz</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li id="active-link">
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
                    Assessments
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->
            <?php if(strtolower($_SESSION['account_type']) == 'instructor') { 
                $ins_ID = $_SESSION['user_id'];
                $ins_course = $_SESSION['course_id'];

                $ins_assessment_select = "SELECT * FROM assessments WHERE student_id IN (SELECT students.student_id FROM students,batches,instructors WHERE batches.instructor_id = instructors.instructor_id AND students.batch_id = batches.batch_id AND instructors.instructor_id = :instructor_id);";
                $ins_assessment_stmt = $connection->prepare($ins_assessment_select);
                $ins_assessment_stmt->execute(['instructor_id' => $ins_ID]);
                $stu_assessments = $ins_assessment_stmt->fetchAll();


                // student
                $ins_batch_select = "SELECT * FROM students,batches WHERE students.batch_id = batches.batch_id AND instructor_id = :instructor_id;";
                $ins_stu_stmt = $connection->prepare($ins_batch_select);
                $ins_stu_stmt->execute(['instructor_id' => $ins_ID]);
                $ins_stus = $ins_stu_stmt->fetchAll();

                // modules 
                $modu_select = "SELECT * FROM modules WHERE course_id = :course_id;";
                $modu_stmt = $connection->prepare($modu_select);
                $modu_stmt->execute(['course_id' =>$ins_course]);
                $modules_ins = $modu_stmt->fetchAll();
                
                
            ?>
                <div class="buttons-wrapper">
                    <span class="record-quiz">
                        <i class="fas fa-plus" ></i>
                        RECORD QUIZ
                    </span>
                    <span class="record-quiz">
                        <i class="fas fa-plus" ></i>
                        RECORD EXAMS
                    </span>
                    <span class="change-quiz-marks">
                        <i class="fas fa-edit" ></i>
                        CHANGE QUIZ MARKS 
                    </span>
                    <span class="change-exams-marks">
                        <i class="fas fa-edit" ></i>
                        CHANGE EXAMS MARKS 
                    </span>
                </div>


                <!--  -->





            <!--  -->









            <?php } ?>


            <!--  admin-->

            <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>

            <section class="list">
                <h2>ASSESSMENTS</h2>
                <div class="list-header">
                    <h3>STUDENT</h3>
                    <h3>MODULE</h3>
                    <h3>QUIZ</h3>
                    <h3>EXAMS</h3>
                    <h3>GRADE</h3>
                </div>
                <?php foreach ($assessments as $assessment) { ?>
                    <div class="list-item">
                        <span><?= ucwords($assessment->first_name . ' ' . $assessment->last_name); ?></span>
                        <span><?= ucfirst($assessment->module_title); ?></span>
                        <span><?= $assessment->quiz_mark; ?></span>
                        <span><?= $assessment->exams_mark; ?></span>
                        <span><?= strtoupper($assessment->grade); ?></span>
                    </div>                   
                <?php } ?>
            </section>

            <?php } ?>
            


            <!--  -->
            
            


            <!-- student -->
            <?php if(strtolower($_SESSION['account_type']) == 'student') { 
                $stu_id = $_SESSION['user_id'];

                $student_assessment_select = "SELECT * FROM assessments, modules WHERE assessments.module_id = modules.module_id AND student_id = :student_id;";
                $student_assessment_stmt = $connection->prepare($student_assessment_select);
                $student_assessment_stmt->execute(['student_id' => $stu_id]);
                $student_assessments = $student_assessment_stmt->fetchAll();
                
                ?>

                <section class="list">
                <h2>ASSESSMENTS</h2>
                <div class="list-header">
                    <h3>MODULE ID</h3>
                    <h3>MODULE</h3>
                    <h3>QUIZ</h3>
                    <h3>EXAMS</h3>
                    <h3>GRADE</h3>
                </div>
                <?php foreach ($student_assessments as $stu_assessment) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($stu_assessment->module_id); ?></span>
                        <span><?= ucwords($stu_assessment->module_title); ?></span>
                        <span><?= $stu_assessment->quiz_mark; ?></span>
                        <span><?= $stu_assessment->exams_mark; ?></span>
                        <span><?= strtoupper($stu_assessment->grade); ?></span>
                    </div>                   
                <?php } ?>
            </section>



            <?php } ?>
          

            <!--  -->

            
            
            

        </div>


        


        





  </div>
</div>




<?php
    include_once('../includes/portal_footer.php');
?>