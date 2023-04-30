<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['record_payment'])) {
    
    $student_id = $_POST['student_id'];
    $recieved_by = $_POST['recieved_by'];
    $date_paid = format_date($_POST['date_paid']);
    $amount = doubleval(validate_text_input($_POST['amount']));


 


     if (empty($date_paid)) {
        header("Location: ../portal/payments.php?date_paid_error=Payment date is required.");
        exit();
    }


    if (empty($amount)) {
        header("Location: ../portal/payments.php?amount_error=Please payment amount is required.");
        exit();
    }


   

    $insert_query = "INSERT INTO `payments`(`student_id`, `recieved_by`, `date_paid`, `amount`) VALUES (:student_id,:recieved_by,:date_paid,:amount);";
    $stmt = $connection->prepare($insert_query);
    


    if($stmt->execute(['student_id' => $student_id, 'recieved_by' => $recieved_by, 'date_paid' => $date_paid, 'amount' => $amount ])){
        header("Location: ../portal/payments.php?success=Payments recorded");
        exit();
    } else {
        header("Location: ../portal/payments.php?error=Something went wrong. Please try again.");
        exit();
    }









} else {
    header("Location: ../portal/payments.php");
    exit();
}