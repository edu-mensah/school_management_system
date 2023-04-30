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
                    <li id="active-link" >
                         <span><i class="fas fa-cedi-sign"></i> <a href="payments.php">Payments</a> </span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <?php if(strtolower($_SESSION['account_type']) == 'administrator' || strtolower($_SESSION['account_type']) == 'student') { ?>
                    <li>
                         <span><i class="fas fa-book"></i> <a href="books.php"> Books</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
                    </li>
                    <?php } ?>
                    <li>
                         <span><i class="fas fa-percent"></i> <a href="notice.php"> Notice</a></span> <!-- <i class="fas fa-chevron-down"></i> -->
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
                    Payments
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->
        <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>
                
            <div class="buttons-wrapper">
                <span class="record-payment">
                    <a href="#">
                        <i class="fas fa-plus" ></i>
                        RECORD PAYMENT
                    </a>
                </span>
                <span class="print-receipt">
                    <i class="fas fa-edit" ></i>
                    PRINT RECIEPT
                </span>
            </div>


            <!--  -->


            <section class="list">
                <div class="list-header">
                    <h3>ID</h3>
                    <h3>STUDENT</h3>
                    <h3>RECIEVED BY</h3>
                    <h3>DATE PAID</h3>
                    <h3>AMOUNT</h3>
                    <!-- <h3>BALANCE</h3> -->
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($payments as $payment) { ?>
                    <div class="list-item">
                        <span><?= $payment->payment_id; ?></span>
                        <span><?= ucwords($payment->first_name . ' ' . $payment->last_name); ?></span>
                        <span><?= $payment->recieved_by; ?></span>
                        <span><?= $payment->date_paid; ?></span>
                        <span><?= $payment->amount; ?></span>
                        <span>
                            <form action="../configuration/delete_payment.php" method="post">
                                <input type="hidden" name="payment_id" value="<?= $payment->payment_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>

                
            </section>

            <!--  -->

            <section class="payment-form" id="payment-form" >
                    <h3 class="form-title" >Record payment</h3>
                <form action="../configuration/record_payment.php" method="post" >

                        <p class="input-label">Paid By:</p>
                        <div class="form-item">
                            <select name="student_id">
                                <option value="">Select the student</option>
                                <?php foreach ($students as $student) { ?>
                                    <option value="<?= $student->student_id; ?>"><?= ucwords($student->first_name . ' ' . $student->last_name); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-user-graduate"></i></span>
                        </div>

                        <!--  -->


                        <p class="input-label">Recieved By:</p>
                        <div class="form-item">
                            <select name="recieved_by">
                                <option value="<?= $_SESSION['user_id'];?>"><?= $_SESSION['user_id'];?></option>
                            </select>
                            <span><i class="fas fa-user"></i></span>
                        </div>



                        <!--  -->

                        
                        <p class="input-label">Date Paid:</p>
                        <?php if (isset($_GET['date_paid_error'])) { ?>
                            <div class="form-item">
                                <input type="date" name="date_paid" autocomplete="off" placeholder="" >
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['date_paid_error'] ?> </p>                            
                        <?php }  else { ?>
                            <div class="form-item">
                                <input type="date" name="date_paid" autocomplete="off" placeholder="">
                                <span><i class="fas fa-calendar"></i></span>
                            </div>
                        <?php }?>


                        <!--  -->
                        

                        <p class="input-label">Amount:</p>
                        <?php if (isset($_GET['amount_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="amount" autocomplete="off" placeholder="Amount Paid" value="<?= $_GET['amount'] ?>"  >
                                <span><i class="fas fa-cedi-sign"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['amount_error']; ?> </p>                            
                        <?php } elseif(isset($_GET['amount'])) { ?>
                            <div class="form-item">
                                <input type="text" name="amount" autocomplete="off" placeholder="Amount Paid" value="<?= $_GET['amount'] ?>"  >
                                <span><i class="fas fa-cedi-sign"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="amount" autocomplete="off" placeholder="Amount Paid" >
                                <span><i class="fas fa-cedi-sign"></i></span>
                            </div>
                        <?php }?>


                        <!--  -->

                    
                        <!--  -->

                        
                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="record_payment" value="RECORD PAYMENT">
                        </div>

                    </div>
                </form>
            </section>

        <?php } ?>
            <!--  -->


            <?php if(strtolower($_SESSION['account_type']) == 'student') { ?>

            <?php } ?>

          

            <!--  -->

            
            
            

    </div>


        


        





  </div>
</div>




<?php
    include_once('../includes/portal_footer.php');
?>