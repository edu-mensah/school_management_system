<?php

class Payment
{
    private $connection;
    private $payment_id;
    private $student_id;
    private $recieved_by;
    private $date_paid;
    private $amount;


    public function __construct($database_connection){
        $this->connection = $database_connection;
    }




    public function record_payment($payment_id,$student_id,$recieved_by,$date_paid,$amount){
        $this->payment_id = trim($payment_id);
        $this->student_id = trim($student_id);
        $this->recieved_by = trim($recieved_by);
        $this->date_paid = trim($date_paid);
        $this->amount = trim(doubleval($amount));


        if (empty($this->amount)) {
            return 0;
        }

        if (empty($this->date_paid)) {
            return 1;
        }


        $record_payment_query = "INSERT INTO `payments`(`payment_id`, `student_id`, `recieved_by`, `date_paid`, `amount`) VALUES (:payment_id,:student_id,:recieved_by,:date_paid,:amount);";
        $stmt_record_payment = $this->connection->prepare($record_payment_query);

        if ($stmt_record_payment->execute(['payment_id' => $this->payment_id, 'student_id' => $this->student_id, 'recieved_by' => $this->recieved_by, 'date_paid' => $this->date_paid, 'amount' => $this->amount])) {
            return true;
        } else{
            return -1;
        }


    }









}
