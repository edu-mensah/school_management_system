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
                    <li id="active-link">
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
                    Courses & Modules
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->

            <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
               
            <div class="buttons-wrapper">
                <span class="add-course">
                    <a href="#course-form">
                        <i class="fas fa-plus" ></i>
                        ADD COURSE
                    </a>
                </span>
                <span class="add-module">
                        <i class="fas fa-plus" ></i>
                        ADD MODULE
                </span>
                <span class="change-course-fee">
                    <i class="fas fa-edit" ></i>
                    CHANGE COURSE FEE
                </span>
            
                
            </div>


            <!--  -->

            <section class="list">
                <h2>COURSES</h2>
                <div class="list-header">
                    <h3>COURSE ID</h3>
                    <h3>COURSE TITLE</h3>
                    <h3>COURSE FEE</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($courses as $course) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($course->course_id); ?></span>
                        <span><?= ucwords($course->course_title); ?></span>
                        <span><?= $course->course_fee; ?></span>
                        <span>
                            <form action="../configuration/delete_course.php" method="post">
                                <input type="hidden" name="course_id" value="<?= $course->course_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>

            </section>

            <!--  -->
            <section class="list">
                <h2>MODULES</h2>
                <div class="list-header">
                    <h3>MODULE ID</h3>
                    <h3>MODULE TITLE</h3>
                    <h3>COURSE</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($modules as $module) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($module->module_id); ?></span>
                        <span><?= ucwords($module->module_title); ?></span>
                        <span><?= ucwords($module->course_title); ?></span>
                        <span>
                            <form action="../configuration/delete_module.php" method="post">
                                <input type="hidden" name="module_id" value="<?= $module->module_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>

            </section>
            <!--  -->


        <!-- course form -->

            <section class="course-form" id="course-form" >
                    <h3 class="form-title" >Add Course</h3>
                <form action="../configuration/add_course.php" method="post" >

                        <p class="input-label">Course Code:</p>
                        <?php if (isset($_GET['course_id_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="course_id" autocomplete="off" placeholder="Course Code" value="<?= $_GET['course_id'] ?>">
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['course_id_error'] ?> </p>
                        <?php } elseif (isset($_GET['course_id'])) { ?>
                            <div class="form-item">
                                <input type="text" name="course_id" autocomplete="off" placeholder="Course Code" value="<?= $_GET['course_id'] ?>">
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="course_id" autocomplete="off" placeholder="Course Code">
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                        <?php } ?>

                        <!--  -->

                        
                        <p class="input-label">Course Title:</p>
                        <?php if (isset($_GET['course_title_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="course_title" autocomplete="off" placeholder="Course Title" value="<?= $_GET['course_title'] ?>" >
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['course_title_error'] ?> </p>                            
                        <?php } elseif (isset($_GET['course_title'])) { ?>
                            <div class="form-item">
                                <input type="text" name="course_title" autocomplete="off" placeholder="Course Title" value="<?= $_GET['course_title'] ?>" >
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="course_title" autocomplete="off" placeholder="Course Title">
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                        <?php }?>
                        
                        
                            <!--  -->

                        <p class="input-label">Course Fee:</p>
                        <?php if (isset($_GET['course_fee_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="course_fee" autocomplete="off" placeholder="Course Fee" value="<?= $_GET['course_fee'] ?>" >
                                <span><i class="fas fa-cedi-sign"></i></span>
                            </div>
                            <p class="form-error"><?= $_GET['course_fee_error']; ?></p>
                        <?php } elseif (isset($_GET['course_fee'])) { ?>
                            <div class="form-item">
                                <input type="text" name="course_fee" autocomplete="off" placeholder="Course Fee" value="<?= $_GET['course_fee'] ?>" >
                                <span><i class="fas fa-cedi-sign"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="course_fee" autocomplete="off" placeholder="Course Fee">
                                <span><i class="fas fa-cedi-sign"></i></span>
                            </div>
                        <?php }?>
                            

                        <!--  -->

                        
                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="add_course" value="ADD COURSE">
                        </div>

                    </div>
                </form>
            </section>


            <!-- module -->

            <section class="module-form" id="module-form" >
                    <h3 class="form-title" >Add Module</h3>
                <form action="../configuration/add_module.php" method="post" >

                        <p class="input-label">Module Code:</p>
                        <?php if (isset($_GET['module_id_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="module_id" autocomplete="off" placeholder="Module Code" value="<?= $_GET['module_id'] ?>">
                                <span><i class="fas fa-book"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['module_id_error'] ?> </p>
                        <?php } elseif (isset($_GET['module_id'])) { ?>
                            <div class="form-item">
                                <input type="text" name="module_id" autocomplete="off" placeholder="Module Code" value="<?= $_GET['module_id'] ?>">
                                <span><i class="fas fa-book"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="module_id" autocomplete="off" placeholder="Module Code">
                                <span><i class="fas fa-book"></i></span>
                            </div>
                        <?php } ?>

                        <!--  -->

                        
                        <p class="input-label">Module Title:</p>
                        <?php if (isset($_GET['module_title_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="module_title" autocomplete="off" placeholder="Module Title" value="<?= $_GET['module_title'] ?>" >
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['module_title_error'] ?> </p>                            
                        <?php } elseif (isset($_GET['module_title'])) { ?>
                            <div class="form-item">
                                <input type="text" name="module_title" autocomplete="off" placeholder="Module Title" value="<?= $_GET['module_title'] ?>" >
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="module_title" autocomplete="off" placeholder="Module Title">
                                <span><i class="fas fa-book-open"></i></span>
                            </div>
                        <?php }?>
                        
                        
                            <!--  -->

                        <p class="input-label">Course:</p>
                        <div class="form-item">
                            <select name="course_id">
                                <option value="">Select a course</option>
                                <?php foreach ($courses as $course) { ?>
                                    <option value="<?= $course->course_id; ?>"><?= ucwords($course->course_title); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>
                            

                        <!--  -->

                        
                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="add_course" value="ADD COURSE">
                        </div>

                    </div>
                </form>
            </section>

          <!--  -->

          


          


            <!--  -->


            <!--  -->


            <section class="change-fee-form" id="change-course-fee" >
                <h3 class="" >Change Course Fee</h3>
                <form action="../configuration/change_course_fee.php" method="post">



                        <!--  -->

                        <p class="input-label">Course:</p>
                         <div class="form-item">
                            <select name="course_id">
                                <option value="">Select a course</option>
                                <?php foreach ($courses as $course) { ?>
                                    <option value="<?= $course->course_id; ?>"><?= ucwords($course->course_title); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>


                        <!--  -->


                        <p class="input-label">Course Fee:</p>
                        <div class="form-item">
                            <input type="text" name="course_fee" autocomplete="off" placeholder="Course Fee">
                            <span><i class="fas fa-cedi-sign"></i></span>
                        </div>



                        <!--  -->



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_fee" value="CHANGE FEE">
                        </div>

                   
                </form>
            </section>



            <!-- Moudle -->


            <!--  -->

            


            <!--  -->

                

          <!--  -->



         

            <!--  -->

        <?php } ?>

            <!--  -->


            <!--  -->

            
            
            

    </div>


        


        





  </div>
</div>




<?php
    include_once('../includes/portal_footer.php');
?>