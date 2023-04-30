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
                    <li id="active-link" >
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
                    Books
                </p>
                <p class="date-text"></p>
            </div>
            
            <!--  -->

        <?php if(strtolower($_SESSION['account_type']) == 'administrator') { ?>

            <div class="buttons-wrapper">
                <span class="add-book">
                    <a href="#book-form">
                    <i class="fas fa-plus" ></i>
                    ADD BOOK
                    </a>
                </span>
                <span class="increase-quantity-btn">
                    <i class="fas fa-edit" ></i>
                    INCREASE BOOK QUANTITY 
                </span>
            </div>


            <!--  -->


            <section class="list">
                <h2>BOOKS</h2>
                <div class="list-header">
                    <h3>BOOK ID</h3>
                    <h3>BOOK TITLE</h3>
                    <h3>QUANTITY</h3>
                    <h3>ACTION</h3>
                </div>
                <?php foreach ($books as $book) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($book->book_id); ?></span>
                        <span><?= ucwords($book->book_title); ?></span>
                        <span><?= $book->quantity; ?></span>
                        <span>
                            <form action="../configuration/delete_book.php" method="post">
                                <input type="hidden" name="book_id" value="<?= $book->book_id; ?>">
                                <button type="submit" name="delete" class="del-btn" ><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </span>
                    </div>                   
                <?php } ?>

                
            </section>

            <!--  -->

            <section class="book-form" id="book-form" >
                    <h3 class="form-title" >Record Book</h3>
                <form action="../configuration/record_book.php" method="post" >

                        <p class="input-label">Book ID:</p>
                        <?php if (isset($_GET['book_id_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="book_id" autocomplete="off" placeholder="Book ID" value = "<?= $_GET['book_id'] ?>" >
                                <span><i class="fas fa-book"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['book_id_error'] ?> </p>                            
                        <?php }  elseif(isset($_GET['book_id'])) { ?>
                            <div class="form-item">
                                <input type="text" name="book_id" autocomplete="off" placeholder="Book ID" value = "<?= $_GET['book_id'] ?>" >
                                <span><i class="fas fa-book"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="book_id" autocomplete="off" placeholder="Book ID" >
                                <span><i class="fas fa-book"></i></span>
                            </div>
                        <?php }?>

                        <!--  -->


                        <p class="input-label">Book Title:</p>
                        <?php if (isset($_GET['book_title_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="book_title" autocomplete="off" placeholder="Book Title" value = "<?= $_GET['book_title'] ?>" >
                                <span><i class="fas fa-book"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['book_title_error'] ?> </p>                            
                        <?php }  elseif(isset($_GET['book_title'])) { ?>
                            <div class="form-item">
                                <input type="text" name="book_title" autocomplete="off" placeholder="Book Title" value = "<?= $_GET['book_title'] ?>" >
                                <span><i class="fas fa-book"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="book_title" autocomplete="off" placeholder="Book Title" >
                                <span><i class="fas fa-book"></i></span>
                            </div>
                        <?php }?>



                        <!--  -->

                        
                        <p class="input-label">Quantity:</p>
                        <?php if (isset($_GET['quantity_error'])) { ?>
                            <div class="form-item">
                                <input type="text" name="quantity" autocomplete="off" placeholder="Quantity" value = "<?= $_GET['quantity'] ?>" >
                                <span><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <p class="form-error"> <?= $_GET['quantity_error'] ?> </p>                            
                        <?php }  elseif(isset($_GET['quantity'])) { ?>
                            <div class="form-item">
                                <input type="text" name="quantity" autocomplete="off" placeholder="Quantity" value = "<?= $_GET['quantity'] ?>" >
                                <span><i class="fab fa-slack-hash"></i></span>
                            </div>
                        <?php } else { ?>
                            <div class="form-item">
                                <input type="text" name="quantity" autocomplete="off" placeholder="Quantity" >
                                <span><i class="fab fa-slack-hash"></i></span>
                            </div>
                        <?php }?>


                        


                        <!--  -->

                    
                        <!--  -->

                        
                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="record_book" value="RECORD BOOK">
                        </div>

                    </div>
                </form>
            </section>


            <!--  -->


            <section class="increase-quantity-form" id="increase-quantity-form" >
                <h3 class="" >Increase Book Quantity</h3>
                <form action="../configuration/increase_book.php" method="post">



                        <div class="form-item">
                            <select name="book_id">
                                <option value="">Select the Book</option>
                                <?php foreach ($books as $book) { ?>
                                    <option value="<?= $book->book_id; ?>"><?= ucwords($book->book_title); ?></option>
                                <?php } ?>
                            </select>
                            <span><i class="fas fa-book"></i></span>
                        </div>

                        <!--  -->

                         <div class="form-item">
                                <input type="text" name="quantity" autocomplete="off" placeholder="Quantity">
                                <span><i class="fab fa-slack-hash"></i></span>
                            </div>  



                        <div class="form-submit" id="form-submit">
                            <input type="submit" name="inrease_quantity" value="INCREASE">
                        </div>

                   
                </form>
            </section>

        <?php } elseif (strtolower($_SESSION['account_type']) == 'student') { ?>
            

            <section class="list">
                <h2>BOOKS COLLECTED</h2>
                <div class="list-header">
                    <h3>BOOK ID</h3>
                    <h3>BOOK TITLE</h3>
                    <h3>QUANTITY</h3>
                </div>
                <?php foreach ($books as $book) { ?>
                    <div class="list-item">
                        <span><?= strtoupper($book->book_id); ?></span>
                        <span><?= ucwords($book->book_title); ?></span>
                        <span><?= $book->quantity; ?></span>
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