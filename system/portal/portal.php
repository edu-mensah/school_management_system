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
                         <span> <i class="fas fa-book-reader"></i> <a href="courses.php">Courses & Modules</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
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
                         <span><i class="fas fa-bullhorn"></i> <a href="notice.php">Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php if(strtolower($_SESSION['account_type']) == 'student' || strtolower($_SESSION['account_type']) == 'instructor') { ?>
                    <li>
                         <span><i class="fas fa-percent"></i> <a href="exams.php"> Exams and Quiz</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
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
            <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
            <div class="dashboard-card-wrapper">
                <div class="">
                    <span class="card-icon" > <i class="fas fa-users" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $number_of_instructors;?></p>
                        <p class="text">INSTRUCTORS</p>
                    </span>
                </div>
                <div class="">
                    <span class="card-icon" > <i class="fas fa-user-graduate" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $number_of_students;?></p>
                        <p class="text">STUDENTS</p>
                    </span>
                </div>
                <div class="">
                    <span class="card-icon" > <i class="fas fa-book-open" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $number_of_courses;?></p>
                        <p class="text">COURSES</p>
                    </span>
                    
                </div>
                <div class="">
                    <span class="card-icon" > <i class="fas fa-th" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $number_of_batches;?></p>
                        <p class="text">BATCHES</p>
                    </span>
                </div>
                <div class="">
                    <span class="card-icon" > <i class="fas fa-book" ></i> </span>
                    <span class="card-details"> 
                        <p class="number">
                        <?php foreach ($books_in_stock as $stock) {
                            echo $stock === NULL ? 0 : $stock;
                        }?>
                    </p>
                    <p class="text">BOOKS IN STOCK</p>
                    </span>
                    
                </div>
                <div class="">
                    <span class="card-icon" > <i class="fas fa-cedi-sign" ></i> </span>
                    <span class="card-details"> 
                        <p class="number">
                        GHc 
                        <?php foreach ($paid_fees as $amount_paid) {
                            echo $amount_paid === NULL ? 0 : $amount_paid;
                            
                        } ?>
                        </p>
                        <p class="text">FEES PAID</p>
                    </span>
                    
                </div>

                
            </div>

            <!--  -->


            <section class="charts">
                <div class="pie-chart">

                </div>
            </section>

        <?php } elseif (strtolower($_SESSION['account_type']) == 'instructor') { 
            $ins_id = $_SESSION['user_id'];

            // studemts
            $inst_student_query = "SELECT * FROM `students` ,`batches` WHERE students.batch_id = batches.batch_id AND instructor_id = :instructor_id;";
            $stmt_inst_student = $connection->prepare($inst_student_query);
            $stmt_inst_student->execute(['instructor_id' => $ins_id]);
            $inst_students = $stmt_inst_student->fetchAll();
            $inst_number_of_students = $stmt_inst_student->rowCount();

            // batches
            $inst_batch_query = "SELECT * FROM `batches` WHERE instructor_id = :instructor_id;";

            $stmt_inst_batch = $connection->prepare($inst_batch_query);
            $stmt_inst_batch->execute(['instructor_id' => $ins_id]);
            $inst_batches = $stmt_inst_batch->fetchAll();
            $inst_number_of_batches = $stmt_inst_batch->rowCount();
            
            
            
            ?>
                <div class="dashboard-card-wrapper">
                <div class="">
                    <span class="card-icon" > <i class="fas fa-user-graduate" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $inst_number_of_students;?></p>
                        <p class="text">STUDENTS</p>
                    </span>
                </div>
                
                <div class="">
                    <span class="card-icon" > <i class="fas fa-th" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $inst_number_of_batches;?></p>
                        <p class="text">BATCHES</p>
                    </span>
                </div>
            
            </div>

            <section class="list">
                <h2>STUDENTS</h2>
                <div class="list-header">
                    <h3>ID</h3>
                    <h3>FIRST NAME</h3>
                    <h3>LAST NAME</h3>
                    <h3>OTHER NAMES</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($inst_students as $student) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($student->student_id); ?></span>
                        <span><?= ucwords($student->first_name); ?></span>
                        <span><?= ucwords($student->last_name); ?></span>
                        <span><?= ucwords($student->other_names); ?></span>
                        <span><a href="students.php"> view </a></span>
                    </div>  
            
                <?php } ?>
            </section>


            <!-- Batches -->

            <section class="list">
                <h2>BATCHES</h2>
                <div class="list-header">
                    <h3>BATCH NAME</h3>
                    <h3>START DATE</h3>
                    <h3>COMPLETION DATE</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($inst_batches as $batch) { ?>
                    <div class="list-item">
                        <span><?= ucwords($batch->batch_name); ?></span>
                        <span><?= $batch->start_date; ?></span>
                        <span><?= $batch->completion_date; ?></span>
                        <span><a href="batches.php"> view </a></span>    
                    </div>                   
                <?php } ?>

                
            </section>


        <?php } elseif (strtolower($_SESSION['account_type']) == 'student') {
            $stu_batch_id = $_SESSION['batch_id'];
            $stu_id = $_SESSION['user_id'];


            // student 
            $select_stu = "SELECT email, phone_number FROM students WHERE student_id = :student_id;";
            $stu_stmt = $connection->prepare($select_stu);
            $stu_stmt->execute(['student_id' => $stu_id]);
            $stu_info = $stu_stmt->fetch();

            // batches
            $stu_batch_query = "SELECT * FROM `batches` WHERE batch_id = :batch_id;";
            $stmt_stu_batch = $connection->prepare($stu_batch_query);
            $stmt_stu_batch->execute(['batch_id' => $stu_batch_id]);
            $stu_batch = $stmt_stu_batch->fetch();

            // colleagues
            $select_other = "SELECT first_name, last_name FROM students WHERE batch_id = :batch_id;";
            $other_stmt = $connection->prepare($select_other);
            $other_stmt->execute(['batch_id' => $stu_batch_id]);
            $other_infos = $other_stmt->fetchAll();

            
            
            ?>
                <div class="dashboard-card-wrapper">
                
                <div class="">
                    <span class="card-icon" > <i class="fas fa-calendar" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $stu_batch->start_date;?></p>
                        <p class="text">START DATE</p>
                    </span>
                </div>

                <div class="">
                    <span class="card-icon" > <i class="fas fa-calendar" ></i> </span>
                    <span class="card-details"> 
                        <p class="number"><?= $stu_batch->completion_date;?></p>
                        <p class="text">COMPLETION DATE</p>
                    </span>
                </div>
                
            </div>
        

        
        <div class="student-dashboard-details">
        
            <!-- student personal info -->
            <section class="student-info">
                <h2>PERSONAL DETAILS</h2>
                <ul>
                    <li>STUDENT ID: <span><?= strtoupper($_SESSION['user_id']); ?></span> </li>
                    <li>LAST NAME: <span><?= ucwords($_SESSION['last_name']); ?></span> </li>
                    <li>FIRST NAME: <span><?= ucwords($_SESSION['first_name']); ?></span> </li>
                    <li>OTHER NAMES: <span><?= ucwords($_SESSION['other_names']); ?></span> </li>
                    <li>EMAIL: <span><?= strtolower($stu_info->email); ?></span> </li>
                    <li>PHONE: <span><?= strtoupper($stu_info->phone_number); ?></span> </li>
                    <li>BIRTH DATE: <span><?= strtoupper($_SESSION['birth_date']); ?></span> </li>
                    <li>GENDER: <span><?= strtoupper($_SESSION['gender']); ?></span> </li>
                    <li>ADDRESS: <span><?= strtoupper($_SESSION['res_address']); ?></span> </li>
                    <li>GUARDIAN: <span><?= strtoupper($_SESSION['guardian_name']); ?></span> </li>
                </ul>
            </section>

            <!-- colleagues -->
            <section class="coll-info">
                <h2>COLLEAGUES</h2>
                <ul>
                    <?php foreach ($other_infos as $stu) { ?>
                        <li><?= ucwords($stu->first_name . ' ' . $stu->last_name); ?></li>
                    <?php }?>
                </ul>
            </section>
        </div>
        
        <?php } ?>












            <!--  -->

            
        </div>





    </div>


      

</div>





















<?php 

    include_once('../includes/portal_footer.php');

?>