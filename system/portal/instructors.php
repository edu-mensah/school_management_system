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
                        <span><i class="fas fa-tachometer-alt"></i> <a href="portal.php">
                                Dashboard</a></span>
                    </li>
                    <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
                    <li id="active-link"> 
                        <span> <i class="fas fa-users"></i> <a href="instructors.php"> Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <?php if(strtolower($_SESSION['account_type']) == 'instructor' || strtolower($_SESSION['account_type']) == 'administrator') { ?>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="students.php"> Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li>
                        <span> <i class="fas fa-book-reader"></i> <a href="courses.php">Courses</a></span>
                        <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                        <span> <i class="fas fa-calendar-alt"></i> <a href="batches.php"> Batches</a></span> 
                    </li>
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
                        <span><i class="fas fa-bullhorn"></i> <a href="notice.php"> Notice</a></span>
                    </li>
                    <?php if(strtolower($_SESSION['account_type']) == 'student' || strtolower($_SESSION['account_type']) == 'instructor') { ?>
                    <li>
                         <span><i class="fas fa-percent"></i> <a href="exams.php"> Exams and Quiz</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li>
                        <span> <i class="fas fa-check-double"></i> <a href="assessments.php">
                                Assessments</a></span></i>
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
                    Instructors
                </p>
                <p class="date-text"></p>
            </div>

        <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>

            <div class="buttons-wrapper">
                <span class="add-instructor">
                    <a href="#instructor-form">
                        <i class="fas fa-plus" ></i>
                        ADD INSTRUCTOR
                    </a>
                </span>
                
                <span class="change-instructor-course">
                    <i class="fas fa-edit" ></i>
                    CHANGE INSTRUCTOR COURSE 
                </span>
            </div>



            <section class="list">
                <h2>INSTRUCTORS</h2>
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
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($instructors as $instructor) { ?>
                    <div class="list-item">
                        <span class="picture"> <img src="../media/profile_pictures/<?= $instructor->profile_picture; ?>" alt=""> </span>
                        <span><?= $instructor->instructor_id; ?></span>
                        <span><?= ucwords($instructor->first_name); ?></span>
                        <span><?= ucwords($instructor->last_name); ?></span>
                        <span><?= ucwords($instructor->other_names); ?></span>
                        <span><?= $instructor->email; ?></span>
                        <span><?= $instructor->phone_number; ?></span>
                        <span><?= $instructor->res_address; ?></span>
                        <span><?= strtoupper($instructor->course_id); ?></span>
                        <span>
                            <form action="../configuration/delete_instructor.php" method="post">
                                <input type="hidden" name="instructor_id" value="<?= $instructor->instructor_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>

                
            </section>


            <!--  -->


            <section class="instructor-form" id="instructor-form" >
                    <h3 class="form-title" >Add Instructor</h3>
                <form action="../configuration/add_instructor.php" method="post" enctype="multipart/form-data">
                    <div class="form-left-section-wrapper">
                        <!-- <div class="form-item">
                            <input type="text" name="instructor_id" autocomplete="off" placeholder="Instructor ID">
                            <span><i class="fas fa-star"></i></span>
                        </div> -->

                        <p class="input-label">First Name:</p>
                        <?php if (isset($_GET['first_name_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="first_name" autocomplete="off" placeholder="First Name" value="<?= $_GET['first_name'] ?>">
                                <span><i class="fas fa-user-alt"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['first_name_error'] ?> </p>
                        <?php } elseif (isset($_GET['first_name'])) { ?>
                            <div class="form-item">
                                <input type="text" name="first_name" autocomplete="off" placeholder="First Name" value="<?= $_GET['first_name'] ?>">
                                <span><i class="fas fa-user-alt"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="first_name" autocomplete="off" placeholder="First Name">
                                <span><i class="fas fa-user-alt"></i></span>
                            </div>
                        <?php } ?>


                        <p class="input-label">Last Name:</p>
                        <?php if (isset($_GET['last_name_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="last_name" autocomplete="off" placeholder="Last Name" value="<?= $_GET['last_name'] ?>" >
                                <span><i class="fas fa-user-alt"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['last_name_error'] ?> </p>                            
                        <?php } elseif (isset($_GET['last_name'])) { ?>
                            <div class="form-item">
                                <input type="text" name="last_name" autocomplete="off" placeholder="Last Name" value="<?= $_GET['last_name'] ?>" >
                                <span><i class="fas fa-user-alt"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="last_name" autocomplete="off" placeholder="Last Name">
                                <span><i class="fas fa-user-alt"></i></span>
                            </div>
                        <?php }?>    
                            


                        <p class="input-label">Other Names:</p>
                        <div class="form-item">
                            <input type="text" name="other_names" autocomplete="off"
                                placeholder="Other Names (optional)">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div>

                        <!--  -->

                        <p class="input-label">Email:</p>
                        <?php if (isset($_GET['email_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="email" autocomplete="off" placeholder="example@example.com" value="<?= $_GET['email'] ?>" >
                                <span><i class="fas fa-envelope"></i></span>
                            </div>
                            <p class="form-error"><?= $_GET['email_error']; ?></p>
                        <?php } elseif (isset($_GET['email'])) { ?>
                            <div class="form-item">
                                <input type="text" name="email" autocomplete="off" placeholder="example@example.com" value="<?= $_GET['email'] ?>" >
                                <span><i class="fas fa-envelope"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="email" autocomplete="off" placeholder="example@example.com">
                                <span><i class="fas fa-envelope"></i></span>
                            </div>
                        <?php }?>
                            


                        <p class="input-label">Phone Number:</p>
                        <?php if (isset($_GET['phone_number_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="phone_number" autocomplete="off" placeholder="0545458752" value="<?= $_GET['phone_number']; ?>" >
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                            <p class="form-error"><?= $_GET['phone_number_error'] ?></p>
                        <?php } elseif (isset($_GET['phone_number'])) { ?>
                            <div class="form-item">
                                <input type="text" name="phone_number" autocomplete="off" placeholder="0545458752" value="<?= $_GET['phone_number']; ?>" >
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="phone_number" autocomplete="off" placeholder="0545458752" >
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                        <?php } ?>





                        <p class="input-label">Birth Date:</p>
                        <?php if (isset($_GET['birth_date_error'])) {?>
                            <div class="form-item">
                                <input type="date" name="birth_date" autocomplete="off" placeholder="Date of Birth"  >
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                            <p class="form-error"><?= $_GET['birth_date_error'] ?></p>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="date" name="birth_date" autocomplete="off" placeholder="Date of Birth">
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                        <?php } ?>
                        




                        <p class="input-label">Residential Address:</p>
                        <div class="form-item">
                            <input type="text" name="res_address" autocomplete="off" placeholder="Residential Address">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                        </div>


                        <p class="input-label">Hire Date:</p>
                        <?php if (isset($_GET['hire_date_error'])) { ?>
                            <div class="form-item">
                                <input type="date" name="hire_date" autocomplete="off" placeholder=" Hire Date">
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                            <p class="form-error"><?= $_GET['hire_date_error'] ?></p>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="date" name="hire_date" autocomplete="off" placeholder=" Hire Date">
                                <span><i class="fas fa-calendar"></i></span>
                            </div>                            
                        <?php }?>

                    </div>

                    <!--  -->
                    <div class="form-right-section-wrapper">


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
                                <?php foreach ($courses as $course) { ?>
                                    <option value="<?= $course->course_id; ?>"><?= ucwords($course->course_title); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>


                        <p class="input-label">Profile Picture:</p>
                        <?php if (isset($_GET['picture_error'])) { ?>
                            <div class="form-item">
                                <input type="file" name="profile_picture" id="">
                                <span><i class="fas fa-upload"></i></span>
                            </div>    
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="file" name="profile_picture" id="">
                                <span><i class="fas fa-upload"></i></span>
                            </div>    
                        <?php } ?>
                        

                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="add_instructor" value="ADD INSTRUCTOR">
                        </div>

                    </div>
                </form>
            </section>
             

            <!--  -->




            <!--  -->

            <section class="change-course-form" id="change-course-form" >
                <h3 class="" >Change Instructor Course</h3>
                <form action="../configuration/change_instructor_course.php" method="post">


                        <!-- <div class="form-item">
                            <input type="text" name="other_names" autocomplete="off"
                                placeholder="Other Names (optional)">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div> -->

                        <div class="form-item">
                            <select name="instructor_id">
                                <option value="">Select the Instructor</option>
                                <?php foreach ($instructors as $instructor) { ?>
                                    <option value="<?= $instructor->instructor_id; ?>"><?= ucwords($instructor->first_name . ' ' . $instructor->last_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
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
                            <input type="submit" name="change_course" value="CHANGE">
                        </div>

                   
                </form>
            </section>

            <?php } elseif (strtolower($_SESSION['account_type']) == 'student') { ?>
                

            <?php } ?>




           
        
        </div>

    </div>







</div>
</div>

























<?php
include_once('../includes/portal_footer.php'); 
?>