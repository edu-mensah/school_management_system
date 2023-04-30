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
                    <li id="active-link" > 
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
                    Students
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->
            <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
                
            
            <div class="buttons-wrapper">
                <span class="add-student">
                    <a href="#student-form">
                    <i class="fas fa-plus" ></i>
                    ADD STUDENT
                    </a>
                </span>
                <span class="change-student-course">
                    <i class="fas fa-edit" ></i>
                    CHANGE STUDENT COURSE 
                </span>
                <span class="change-student-batch">
                    <i class="fas fa-edit" ></i>
                    CHANGE STUDENT BATCH 
                </span>
            </div>
            <!--  -->

             <section class="list">
                <h2>STUDENTS</h2>
                <div class="list-header">
                    <h3>IMAGE</h3>
                    <h3>ID</h3>
                    <h3>FIRST NAME</h3>
                    <h3>LAST NAME</h3>
                    <h3>OTHER NAMES</h3>
                    <h3>EMAIL</h3>
                    <h3>PHONE</h3>
                    <h3>RESIDENCE</h3>
                    <h3>COURSE</h3>
                    <h3>BATCH</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($students as $student) { ?>
                    <div class="list-item">
                        <span class="picture"> <img src="../media/profile_pictures/<?= $student->profile_picture; ?>" alt=""> </span>
                        <span><?= $student->student_id; ?></span>
                        <span><?= ucwords($student->first_name); ?></span>
                        <span><?= ucwords($student->last_name); ?></span>
                        <span><?= ucwords($student->other_names); ?></span>
                        <span><?= $student->email; ?></span>
                        <span><?= $student->phone_number; ?></span>
                        <span><?= $student->res_address; ?></span>
                        <span><?= strtoupper($student->course_id); ?></span>
                        <span><?= strtoupper($student->batch_id); ?></span>
                        <span>
                            <form action="../configuration/delete_student.php" method="post">
                                <input type="hidden" name="student_id" value="<?= $student->student_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>
            </section>         

            <!--  -->


            <section class="student-form" id="student-form" >
                <h3 class="form-title" >Add Student</h3>
                <form action="../configuration/add_student.php" method="post" enctype="multipart/form-data">

                    <div class="form-left-section-wrapper">

                        <p class="input-label">First Name:</p>
                        <div class="form-item">
                            <input type="text" name="first_name" autocomplete="off" placeholder="First Name">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div>

                        <p class="input-label">Last Name:</p>
                        <div class="form-item">
                            <input type="text" name="last_name" autocomplete="off" placeholder="Last Name">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div>


                        <p class="input-label">Other Names:</p>
                        <div class="form-item">
                            <input type="text" name="other_names" autocomplete="off"
                                placeholder="Other Names (optional)">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div>


                        <p class="input-label">Email:</p>
                        <div class="form-item">
                            <input type="text" name="email" autocomplete="off" placeholder="example@example.com">
                            <span><i class="fas fa-envelope"></i></span>
                        </div>


                        <p class="input-label">Phone Number:</p>
                        <div class="form-item">
                            <input type="text" name="phone_number" autocomplete="off" placeholder="0545458752">
                            <span><i class="fas fa-phone"></i></span>
                        </div>


                        <p class="input-label">Birth Date:</p>
                        <div class="form-item">
                            <input type="date" name="birth_date" autocomplete="off" placeholder="Date of Birth">
                            <span><i class="fas fa-calendar"></i></span>
                        </div>


                    

                        <p class="input-label">Guardian Name:</p>
                        <div class="form-item">
                            <input type="text" name="guardian_name" autocomplete="off" placeholder="Guardian Name">
                            <span><i class="fas fa-user"></i></span>
                        </div>


                    </div>

                    <div class="form-right-section-wrapper">

                        <p class="input-label">Guardian Contact:</p>
                        <div class="form-item">
                            <input type="text" name="guardian_contact" autocomplete="off" placeholder="Guardian Contact">
                            <span><i class="fas fa-phone"></i></span>
                        </div>




                        <p class="input-label">Residential Address:</p>
                        <div class="form-item">
                            <input type="text" name="res_address" autocomplete="off" placeholder="Residential Address">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                        </div>

                    <!--  -->

                        <p class="input-label">Gender:</p>
                        <div class="form-item">
                            <select name="gender" id="">
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span><i class="fas fa-mars-double"></i></span>
                        </div>


                        <p class="input-label">Course:</p>
                        <div class="form-item">
                            <select name="course_id">
                                <option value="">Select a course</option>
                                <option value="">none</option>
                                <?php foreach ($courses as $course) { ?>
                                    <option value="<?= $course->course_id; ?>"><?= ucwords($course->course_title); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>


                        <p class="input-label">Batch:</p>
                        <div class="form-item">
                            <select name="batch_id">
                                <option value="" >Select a course</option>
                                <option value="" >none</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>                        


                        <p class="input-label">Profile Picture:</p>
                        <div class="form-item">
                            <input type="file" name="profile_picture" id="">
                            <span><i class="fas fa-upload"></i></span>
                        </div>


                        <!--  -->

                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="add_student" value="ADD STUDENT">
                        </div>

                    </div>
                </form>
            </section>


            <!--  -->

            <section class="change-student-course-form" id="change-course-form" >
                <h3 class="" >Change Student Course</h3>
                <form action="../configuration/change_student_course.php" method="post">


                        <!-- <div class="form-item">
                            <input type="text" name="other_names" autocomplete="off"
                                placeholder="Other Names (optional)">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div> -->

                        <div class="form-item">
                            <select name="student_id">
                                <option value="">Select the Student</option>
                                <?php foreach ($students as $student) { ?>
                                    <option value="<?= $student->student_id; ?>"><?= ucwords($student->first_name . ' ' . $student->last_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-user-graduate"></i></span>
                        </div>

                        <!--  -->

                         <div class="form-item">
                            <select name="course_id">
                                <option value="">Select a course</option>
                                <?php foreach ($courses as $course) { ?>
                                    <option value="<?= $course->course_id; ?>"><?= ucwords($course->course_title); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_course" value="CHANGE COURSE">
                        </div>

                   
                </form>
            </section>


            <!--  -->


            <section class="change-student-batch-form" id="change-batch-form" >
                <h3 class="" >Change Student Batch</h3>
                <form action="../configuration/change_student_batch.php" method="post">


                        <!-- <div class="form-item">
                            <input type="text" name="other_names" autocomplete="off"
                                placeholder="Other Names (optional)">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div> -->

                        <div class="form-item">
                            <select name="student_id">
                                <option value="">Select the student</option>
                                <?php foreach ($students as $student) { ?>
                                    <option value="<?= $student->student_id; ?>"><?= ucwords($student->first_name . ' ' . $student->last_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>

                        <!--  -->

                         <div class="form-item">
                            <select name="batch_id">
                                <option value="">Select a batch</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_batch" value="CHANGE BATCH">
                        </div>

                   
                </form>
            </section>


            <?php } elseif (strtolower($_SESSION['account_type']) == 'instructor') { 
            $ins_id = $_SESSION['user_id'];

            // studemts
            $inst_student_query = "SELECT * FROM `students` ,`batches` WHERE students.batch_id = batches.batch_id AND instructor_id = :instructor_id;";
            $stmt_inst_student = $connection->prepare($inst_student_query);
            $stmt_inst_student->execute(['instructor_id' => $ins_id]);
            $inst_students = $stmt_inst_student->fetchAll();
            $inst_number_of_students = $stmt_inst_student->rowCount();

            
            ?>

            <section class="list">
                <h2>STUDENTS</h2>
                <div class="list-header">
                    <h3>IMAGE</h3>
                    <h3>ID</h3>
                    <h3>FIRST NAME</h3>
                    <h3>LAST NAME</h3>
                    <h3>OTHER NAMES</h3>
                    <h3>EMAIL</h3>
                    <h3>PHONE</h3>
                    <h3>BATCH</h3>
                </div>
                <?php foreach ($inst_students as $student) { ?>
                    <div class="list-item">
                        <span class="picture"> <img src="../media/profile_pictures/<?= $student->profile_picture; ?>" alt=""> </span>
                        <span><?= strtoupper($student->student_id); ?></span>
                        <span><?= ucwords($student->first_name); ?></span>
                        <span><?= ucwords($student->last_name); ?></span>
                        <span><?= ucwords($student->other_names); ?></span>
                        <span><?= $student->email; ?></span>
                        <span><?= $student->phone_number; ?></span>
                        <span><?= strtoupper($student->batch_id); ?></span>
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