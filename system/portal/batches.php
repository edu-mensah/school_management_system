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
                    <li> 
                        <span> <i class="fas fa-users"></i> <a href="instructors.php"> Instructors</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li> 
                        <span><i class="fas fa-user-graduate"></i> <a href="students.php"> Students</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span> <i class="fas fa-book-reader"></i> <a href="courses.php"> Courses</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li id="active-link">
                         <span> <i class="fas fa-calendar-alt"></i> <a href="batches.php"> Batches</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-cedi-sign"></i> <a href="fees.php">Payments</a> </span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-book"></i> <a href="books.php"> Books</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <li>
                         <span><i class="fas fa-bullhorn"></i> <a href="notice.php"> Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
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
                    Batches
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->
            <div class="buttons-wrapper">
                <span class="add-batch">
                    <a href="#batch-form">
                        <i class="fas fa-plus" ></i>
                        ADD BATCH
                    </a>
                </span>
                <!--  -->
                <span class="change-batch-class-time-btn">
                    <i class="fas fa-edit" ></i>
                    CHANGE BATCH CLASS TIME 
                </span>
                <!--  -->
                <span class="change-batch-instructor-btn">
                    <i class="fas fa-edit" ></i>
                    CHANGE BATCH INSTRUCTOR
                </span>
                <!--  -->
                <span class="change-batch-start-date-btn">
                    <i class="fas fa-edit" ></i>
                    CHANGE START DATE
                </span>
                <span class="change-batch-completion-date-btn">
                    <i class="fas fa-edit" ></i>
                    CHANGE COMPLETION DATE
                </span>
                <!--  -->
                <span class="change-batch-completion-status-btn">
                    <i class="fas fa-edit" ></i>
                    CHANGE COMPLETION STATUS
                </span>
            </div>


            <!--  -->

            <section class="list">
                <div class="list-header">
                    <h3>BATCH ID</h3>
                    <h3>BATCH NAME</h3>
                    <h3>START DATE</h3>
                    <h3>COMPLETION DATE</h3>
                    <h3>CLASS TIME</h3>
                    <h3>INSTRUCTOR IN CHARGE</h3>
                    <h3>COMPLETION STATUS</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($batches as $batch) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($batch->batch_id); ?></span>
                        <span><?= ucwords($batch->batch_name); ?></span>
                        <span><?= $batch->start_date; ?></span>
                        <span><?= $batch->completion_date; ?></span>
                        <span><?= $batch->class_time; ?></span>
                        <span><?= strtoupper($batch->instructor_id); ?></span>
                        <span><?= strtoupper($batch->completion_status); ?></span>
                        <span>
                            <form action="../configuration/delete_batch.php" method="post">
                                <input type="hidden" name="batch_id" value="<?= $batch->batch_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>

                
            </section>

            <!--  -->


            <section class="batch-form" id="batch-form" >
                    <h3 class="form-title" >Create Batch</h3>
                <form action="../configuration/add_batch.php" method="post" >

                        <p class="input-label">Batch Name:</p>
                        <?php if (isset($_GET['batch_name_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="batch_name" autocomplete="off" placeholder="Batch Name" value="<?= $_GET['batch_name'] ?>">
                                <span><i class="fab fa-readme"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['batch_name_error'] ?> </p>
                        <?php } elseif (isset($_GET['batch_name'])) { ?>
                            <div class="form-item">
                                <input type="text" name="batch_name" autocomplete="off" placeholder="Batch Name" value="<?= $_GET['batch_name'] ?>">
                                <span><i class="fab fa-readme"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="batch_name" autocomplete="off" placeholder="Batch Name">
                                <span><i class="fab fa-readme"></i></span>
                            </div>
                        <?php } ?>

                        <!--  -->

                        
                        <p class="input-label">Start Date:</p>
                        <?php if (isset($_GET['start_date_error'])) { ?>
                            <div class="form-item">
                                <input type="date" name="start_date" autocomplete="off" placeholder="Start Date" >
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['start_date_error'] ?> </p>                            
                        <?php }  else { ?>
                            <div class="form-item">
                                <input type="date" name="start_date" autocomplete="off" placeholder="Start Date">
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                        <?php }?>


                        <!--  -->

                        <p class="input-label">Completion Date:</p>
                        <?php if (isset($_GET['completion_date_error'])) { ?>
                            <div class="form-item">
                                <input type="date" name="completion_date" autocomplete="off" placeholder="Completion Date"  >
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['completion_date_error'] ?> </p>                            
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="date" name="completion_date" autocomplete="off" placeholder="Completion Date">
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                        <?php }?>
                        


                        <!--  -->

                        <p class="input-label">Class Time:</p>
                        <div class="form-item">
                            <select name="class_time">
                                <option value="">Assign a class time</option>
                                <?php foreach ($class_times as $time) { ?>
                                    <option value="<?= $time->class_time; ?>"><?= ucwords($time->class_time); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-stopwatch"></i></span>
                        </div>


                        <!--  -->

                        <p class="input-label">Assign an Instructor:</p>
                        <div class="form-item">
                            <select name="instructor_id">
                                <option value="">Assign an Instructor</option>
                                <?php foreach ($instructors as $instructor) { ?>
                                    <option value="<?= $instructor->instructor_id; ?>"><?= ucwords($instructor->first_name . ' ' . $instructor->last_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>
                            

                        <!--  -->

                        
                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="add_batch" value="CREATE BATCH">
                        </div>

                    </div>
                </form>
            </section>

          

            <!--  -->


            <section class="change-class-time-form" id="change-class-time" >
                <h3 class="" >Change Batch Class Time</h3>
                <form action="../configuration/change_class_time.php" method="post">

                        <div class="form-item">
                            <select name="batch_id">
                                <option value="">Select the batch</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>

                        <!--  -->

                         <div class="form-item">
                            <select name="class_time">
                                <option value="">Select a class time</option>
                                <?php foreach ($class_times as $time) { ?>
                                    <option value="<?= $time->class_time; ?>"><?= ucwords($time->class_time); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-stopwatch"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_class_time" value="CHANGE">
                        </div>

                   
                </form>
            </section>


            <!--  -->

            <section class="change-batch-instructor-form" id="change-batch-instructor" >
                <h3 class="" >Change Batch Instructor</h3>
                <form action="../configuration/change_batch_instructor.php" method="post">

                        <div class="form-item">
                            <select name="batch_id">
                                <option value="">Select the batch</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>

                        <!--  -->


                          <div class="form-item">
                            <select name="instructor_id">
                                <option value="">Select an instructor</option>
                                <?php foreach ($instructors as $instructor) { ?>
                                    <option value="<?= $instructor->instructor_id; ?>"><?= ucwords($instructor->first_name . ' ' . $instructor->last_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_instructor" value="CHANGE">
                        </div>

                   
                </form>
            </section>



            <!--  -->

            <section class="change-start-date-form" id="change-start-date" >
                <h3 class="" >Change Batch Start Date</h3>
                <form action="../configuration/change_batch_start_date.php" method="post">

                        <div class="form-item">
                            <select name="batch_id">
                                <option value="">Select the batch</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>

                        <!--  -->

                        <p class="input-label">Start Date:</p>
                        <div class="form-item">
                            <input type="date" name="start_date" autocomplete="off" placeholder="Start Date">
                            <span><i class="fas fa-calendar"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_start_date" value="CHANGE">
                        </div>

                   
                </form>
            </section>


            <!--  -->

            <section class="change-completion-date-form" id="change-completion-date" >
                <h3 class="" >Change Batch Completion Date</h3>
                <form action="../configuration/change_batch_completion_date.php" method="post">

                        <div class="form-item">
                            <select name="batch_id">
                                <option value="">Select the batch</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>

                        <!--  -->

                        <p class="input-label">Completion Date:</p>
                        <div class="form-item">
                            <input type="date" name="completion_date" autocomplete="off" placeholder="Completion Date">
                            <span><i class="fas fa-calendar"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_completion_date" value="CHANGE">
                        </div>

                   
                </form>
            </section>

            <!--  -->


            <section class="change-completion-status-form" id="change-completion-status" >
                <h3 class="" >Change Batch Completion Status</h3>
                <form action="../configuration/change_batch_completion_status.php" method="post">

                        <div class="form-item">
                            <select name="batch_id">
                                <option value="">Select the batch</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-users"></i></span>
                        </div>

                        <!--  -->

                        <div class="form-item">
                            <select name="completion_status">
                                <option value="">Set batch completion status</option>
                                <option value="no">Not completed</option>
                                <option value="yes">Completed</option>
                            </select>
                            <span><i class="fas fa-vote-yea"></i></span>
                        </div>



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="change_completion_status" value="CHANGE">
                        </div>

                   
                </form>
            </section>



            <!--  -->

            
            
            

        </div>


        


        





  </div>
</div>




<?php
    include_once('../includes/portal_footer.php');
?>