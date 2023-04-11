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
                    <li id="active-link">
                        <span> <i class="fas fa-users"></i> <a href="instructors.php">
                                Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                        <span><i class="fas fa-user-graduate"></i> <a href="students.php">
                                Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                        <span> <i class="fas fa-book-reader"></i> <a href="courses.php">Courses</a></span>
                        <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                        <span> <i class="fas fa-calendar-alt"></i> <a href="batches.php"> Batches</a></span> 
                    </li>
                    <li>
                        <span><i class="fas fa-cedi-sign"></i> <a href="fees.php">Payments</a>
                    <li>
                        <span><i class="fas fa-book"></i> <a href="books.php"> Books</a></span>
                    </li>
                    <li>
                        <span><i class="fas fa-bullhorn"></i> <a href="notice.php"> Notice</a></span>
                    </li>
                    <li>
                         <span><i class="fas fa-percent"></i> <a href="exams.php"> Exams and Quiz</a></span> 
                    </li>
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
                <div class="list-item">
                    <span class="picture"> <img src="../media/profile_pictures/<?= $_SESSION['profile_picture']; ?>" alt=""> </span>
                    <span><?= $_SESSION['first_name']; ?></span>
                    <span><?= $_SESSION['last_name']; ?></span>
                    <span><?= $_SESSION['res_address']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span>
                        <form action="" method="post">
                            <input type="hidden" name="instructor_id" value="<?= $_SESSION['user_id']; ?>">
                            <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                        </form>
                    </span>
                </div>
                <div class="list-item">
                    <span class="picture"> <img src="../media/profile_pictures/<?= $_SESSION['profile_picture']; ?>" alt=""> </span>
                    <span><?= $_SESSION['first_name']; ?></span>
                    <span><?= $_SESSION['last_name']; ?></span>
                    <span><?= $_SESSION['res_address']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span>
                        <form action="" method="post">
                            <input type="hidden" name="instructor_id" value="<?= $_SESSION['user_id']; ?>">
                            <button type="submit" name="delete"><i class="fas fa-trash-alt" ></i></button>
                        </form>
                    </span>
                </div>
                <div class="list-item">
                    <span class="picture"> <img src="../media/profile_pictures/<?= $_SESSION['profile_picture']; ?>" alt=""> </span>
                    <span><?= $_SESSION['first_name']; ?></span>
                    <span><?= $_SESSION['last_name']; ?></span>
                    <span><?= $_SESSION['res_address']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span> <p class="del" ><i class="fas fa-trash-alt" ></i></p></span>
                </div>
                <div class="list-item">
                    <span class="picture"> <img src="../media/profile_pictures/<?= $_SESSION['profile_picture']; ?>" alt=""> </span>
                    <span><?= $_SESSION['first_name']; ?></span>
                    <span><?= $_SESSION['last_name']; ?></span>
                    <span><?= $_SESSION['res_address']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span><?= $_SESSION['phone_number']; ?></span>
                    <span> <p class="del" ><i class="fas fa-trash-alt" ></i></p></span>

                </div>
            </section>


            <!--  -->


            <section class="instructor-form" id="instructor-form" >
                    <h3 class="form-title" >Add Instructor</h3>
                <form action="../configuration/instructor_configuration.php" method="post" enctype="multipart/form-data">
                    <div class="form-left-section-wrapper">
                        <!-- <div class="form-item">
                            <input type="text" name="instructor_id" autocomplete="off" placeholder="Instructor ID">
                            <span><i class="fas fa-star"></i></span>
                        </div> -->

                        <div class="form-item">
                            <input type="text" name="first_name" autocomplete="off" placeholder="First Name">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div>

                        <div class="form-item">
                            <input type="text" name="last_name" autocomplete="off" placeholder="Last Name">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div>


                        <div class="form-item">
                            <input type="text" name="other_names" autocomplete="off"
                                placeholder="Other Names (optional)">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div>

                        <div class="form-item">
                            <input type="text" name="email" autocomplete="off" placeholder="example@example.com">
                            <span><i class="fas fa-envelope"></i></span>
                        </div>

                        <div class="form-item">
                            <input type="text" name="phone_number" autocomplete="off" placeholder="0545458752">
                            <span><i class="fas fa-phone"></i></span>
                        </div>


                        <div class="form-item">
                            <input type="date" name="birth_date" autocomplete="off" placeholder="Date of Birth">
                            <span><i class="fas fa-calendar"></i></span>
                        </div>


                        <div class="form-item">
                            <input type="text" name="res_address" autocomplete="off" placeholder="Residential Address">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                        </div>


                        <div class="form-item">
                            <input type="date" name="hire_date" autocomplete="off" placeholder=" Hire Date">
                            <span><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>

                    <!--  -->
                    <div class="form-right-section-wrapper">


                        <div class="form-item">
                            <select name="gender" id="">
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span><i class="fas fa-mars-double"></i></span>
                        </div>


                        <div class="form-item">
                            <select name="course_id">
                                <option value="">Select a course</option>
                                <option value="">GRWD</option>
                                <option value="">SE</option>
                                <option value="">DBT</option>
                                <option value="">HWR</option>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>


                        <div class="form-item">
                            <input type="file" name="profile_picture" id="">
                            <span><i class="fas fa-upload"></i></span>
                        </div>

                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="add_intructor" value="REGISTER">
                        </div>

                    </div>
                </form>
            </section>
             

            <!--  -->




            <!--  -->

            <section class="change-course-form" id="change-course-form" >
                <h3 class="" >Change Instructor Course</h3>
                <form action="../configuration/instructor_configuration.php" method="post">


                        <!-- <div class="form-item">
                            <input type="text" name="other_names" autocomplete="off"
                                placeholder="Other Names (optional)">
                            <span><i class="fas fa-user-alt"></i></span>
                        </div> -->

                        <div class="form-item">
                            <select name="course_id">
                                <option value="">Select the Instructor</option>
                                <option value="">Kwame Ana-bey</option>
                                <option value="">Kofi Nyarko</option>
                                <option value="">Kweku Mensah</option>
                                <option value="">Lydia Mensah</option>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>

                        <!--  -->

                         <div class="form-item">
                            <select name="course_id">
                                <option value="">Select a course</option>
                                <option value="">GRWD</option>
                                <option value="">SE</option>
                                <option value="">DBT</option>
                                <option value="">HWR</option>
                            </select>
                            <span><i class="fas fa-book-reader"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_course" value="CHANGE">
                        </div>

                   
                </form>
            </section>




           
        
        </div>

    </div>







</div>
</div>

























<?php
include_once('../includes/portal_footer.php'); 
?>