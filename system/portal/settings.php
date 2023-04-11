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
                    <li>
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
                    <li id="active-link" >
                        <span> <i class="fas fa-cog"></i> <a href="settings.php"> Settings</a></span> 
                    </li>
                </ul>
            </div>
        </div>




         <div class="dashboah-content-wrapper">
            <div class="date-bar-wrapper">
                <p class="dashboard-text">
                    Settings
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->
            <div class="change-password-wrapper">
                <form action="" method="post">
                    <h3>Change Passoword</h3>
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                    <input type="hidden" name="account_type" value="<?= $_SESSION['account_type']; ?>">
                    <?php   if (isset($_GET['new_password_error'])) { ?>
                        <div class="form-item">
                        <span> <i class="fas fa-lock"></i> </span>
                        <input type="password" name="new_password" placeholder="New Passoword" value="<?= $_GET['new_password'] ?>" autocomplete="off" id="">
                    </div>
                    <p class="error"> <?= $_GET['new_password_error'] ?> </p>
                    <?php } elseif(isset($_GET['new_password'])) { ?>
                        <div class="form-item">
                        <span> <i class="fas fa-lock"></i> </span>
                        <input type="password" name="new_password" placeholder="New Password" value="<?= $_GET['new_password'] ?>" autocomplete="off" id="">
                    </div>
                        <?php }else { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-lock"></i> </span>
                            <input type="password" name="new_password" placeholder="New Password" autocomplete="off" id="">
                        </div>
                        <?php } ?>
                    


                        <!--  -->
                        <?php  if (isset($_GET['confirm_password_error'])) { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-lock"></i> </span>
                            <input type="password" name="confirm_password" placeholder="Confirm New Password" value="<?= $_GET['confirm_password'] ?>" autocomplete="off" id="">
                        </div>
                        <p class="error"> <?= $_GET['confirm_password_error'] ?> </p>
                        <?php } elseif (isset($_GET['confirm_password'])) { ?>
                            <div class="form-item">
                                <span> <i class="fas fa-lock"></i> </span>
                                <input type="password" name="confirm_password" placeholder="Confirm New Password" value="<?= $_GET['confirm_password'] ?>" autocomplete="off" id="">
                            </div>
                        <?php } else{ ?>
                            <div class="form-item">
                                <span> <i class="fas fa-lock"></i> </span>
                                <input type="password" name="confirm_password" placeholder="Confirm New Password" autocomplete="off" id="">
                            </div>
                        <?php } ?>

                        <!--  -->
                        

                    <div class="form-submit">
                        <input type="submit" name="change_password" value="CHANGE PASSWORD" id="">
                    </div>
                </form>
            </div>


            <!--  -->


            <div class="change-phone-wrapper">
                <form action="" method="post">
                    <h3>Change Phone Number</h3>
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
                    <input type="hidden" name="account_type" value="<?= $_SESSION['account_type']; ?>">
                    <?php   if (isset($_GET['new_password_error'])) { ?>
                        <div class="form-item">
                        <span> <i class="fas fa-phone"></i> </span>
                        <input type="text" name="new_password" placeholder="Phone Number" value="<?= $_GET['new_password'] ?>" autocomplete="off" id="">
                    </div>
                    <p class="error"> <?= $_GET['new_password_error'] ?> </p>
                    <?php } elseif(isset($_GET['new_password'])) { ?>
                        <div class="form-item">
                        <span> <i class="fas fa-phone"></i> </span>
                        <input type="text" name="new_password" placeholder="Phone Number" value="<?= $_GET['new_password'] ?>" autocomplete="off" id="">
                    </div>
                        <?php }else { ?>
                        <div class="form-item">
                            <span> <i class="fas fa-phone"></i> </span>
                            <input type="text" name="new_password" placeholder="Phone Number" autocomplete="off" id="">
                        </div>
                        <?php } ?>

                        <!--  -->
                        

                    <div class="form-submit">
                        <input type="submit" name="change_phone_number" value="CHANGE NUMBER" id="">
                    </div>
                </form>
            </div>

            <!--  -->

          

            <!--  -->

            
            
            

        </div>


        


        





  </div>
</div>




<?php
    include_once('../includes/portal_footer.php');
?>