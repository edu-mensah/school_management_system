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
                    <li>
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
                    <li id="active-link">
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
                    Notice
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->
            <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
                <div class="buttons-wrapper">
                    <span class="send-notice">
                        <i class="fas fa-plus" ></i>
                        SEND NOTICE
                    </span>
                   
                </div>


                <!--  -->


                <section class="sent-notice">
                    <h2>SENT NOTICE</h2>
                    <?php 
                    $user_ID = $_SESSION['user_id'];
                    $notice_sent_by = "SELECT * FROM notice WHERE notice_by = :user_ID ORDER BY notice_id;";
                    $notice_sent_stmt = $connection->prepare($notice_sent_by);
                    $notice_sent_stmt->execute(['user_ID' => $user_ID]);
                    $all_notice_by = $notice_sent_stmt->fetchAll();
                    
                    foreach ($all_notice_by as $notice) { ?>
                    

                    <div class="notice-list">
                        <div>
                            <p class="notice-header" ><?= ucwords($notice->notice_header); ?></p>
                        <p class="notice-body"> <?= ucfirst($notice->notice_body) ?></p>
                        <!-- <p class="notice-by">
                            From your Admin
                        </p> -->
                        </div>
                        <form action="../configuration/delete_notice.php" method="post">
                            <input type="hidden" value="<?= $notice->notice_id?>">
                            <button type="submit" class="notice-del-btn" > <i class="fas fa-times" ></i> </button>
                        </form>
                    </div>
                    <?php } ?>
                </section>


                <!-- form -->


                <section class="notice-form" id="notice-form" >
                    <h3 class="form-title" >Send Notice</h3>
                <form action="../configuration/send_notice.php" method="post" >

                        <p class="input-label">Notice head:</p>
                        <?php if (isset($_GET['notice_head_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="notice_head" autocomplete="off" placeholder="Notice head" value="<?= $_GET['notice_head'] ?>">
                                <span><i class="fas fa-hullhorn"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['notice_head_error'] ?> </p>
                        <?php } elseif (isset($_GET['notice_head'])) { ?>
                            <div class="form-item">
                                <input type="text" name="notice_head" autocomplete="off" placeholder="Notice head" value="<?= $_GET['notice_head'] ?>">
                                <span><i class="fas fa-bullhorn"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="notice_head" autocomplete="off" placeholder="Notice head">
                                <span><i class="fas fa-bullhorn"></i></span>
                            </div>
                        <?php } ?>

                        <!--  -->

                        
                        <p class="input-label">Notice Body:</p>
                        <?php if (isset($_GET['notice_body_error'])) { ?>
                            <div class="form-item">
                                <textarea name="notice_body" autocomplete="off" placeholder="Notice Body" value="<?= $_GET['notice_body'] ?>" cols="" rows=""></textarea>
                                <!-- <span><i class="fas fa-book-open"></i></span> -->
                            </div>
                            <p class="form-error"> <?= $_GET['notice_body_error'] ?> </p>                            
                        <?php } elseif (isset($_GET['notice_body'])) { ?>
                            <div class="form-item">
                                <textarea name="notice_body" autocomplete="off" placeholder="Notice Body" value="<?= $_GET['notice_body'] ?>" cols="" rows=""></textarea>
                                <!-- <span><i class="fas fa-bullhorn"></i></span> -->
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <textarea name="notice_body" autocomplete="off" placeholder="Notice Body"  cols="" rows=""></textarea>
                                <!-- <span><i class="fas fa-bullhorn"></i></span> -->
                            </div>
                        <?php }?>
                        
                        
                            <!--  -->
                            <!-- notice sender -->
                            <input type="hidden" name="notice_by" value="<?= $_SESSION['user_id']; ?>" >

                             <!--  -->
                             <p class="input-label">Notice To:</p>
                             <div class="form-item">
                                <select name="notice_to">
                                    <option value="">Select the recievers</option>
                        <?php if (strtolower($_SESSION['account_type']) == 'administrator') { ?>
                                
                                <option value="all students">All students</option>
                                <option value="all instructors">All instructors</option>
                                <?php foreach ($batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                        <?php } elseif (strtolower($_SESSION['account_type']) == 'instructor') { 
                            $ins_id = $_SESSION['user_id'];
                            $instructor_batch_query = "SELECT * FROM `batches` WHERE instructor_id = $ins_id;";
                            $stmt_ins_batches = $connection->prepare($instructor_batch_query);
                            $stmt_ins_batches->execute();
                            $ins_batches = $stmt_ins_batches->fetchAll();
                            
                            ?>
                                <?php foreach ($ins_batches as $batch) { ?>
                                    <option value="<?= $batch->batch_id; ?>"><?= ucwords($batch->batch_name); ?></option>
                                <?php } ?>
                        <?php } ?>
                            </select>
                            <span><i class="fas fa-user-graduate"></i></span>
                        </div>

                            <!--  -->

                        
                            

                        <!--  -->

                        
                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="send_notice" value="SEND NOTICE">
                        </div>

                    </div>
                </form>
            </section>



            <?php } ?>
            


            <!--  -->
            <?php if(strtolower($_SESSION['account_type']) == 'instructor') { ?>
                   
            <?php } ?>

          <!--  -->

          <?php if(strtolower($_SESSION['account_type']) == 'student') { ?>
            
            <?php } ?>

            <!--  -->

            
            
            

        </div>


        


        





</div>





<?php
    include_once('../includes/portal_footer.php');
?>