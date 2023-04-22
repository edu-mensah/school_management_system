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


        

        $record_payment_query = "INSERT INTO `payments`(`payment_id`, `student_id`, `recieved_by`, `date_paid`, `amount`) VALUES (:payment_id,:student_id,:recieved_by,:date_paid,:amount);";
        $stmt_record_payment = $this->connection->prepare($record_payment_query);

        if ($stmt_record_payment->execute(['payment_id' => $this->payment_id, 'student_id' => $this->student_id, 'recieved_by' => $this->recieved_by, 'date_paid' => $this->date_paid, 'amount' => $this->amount])) {
            return true;
        } else{
            return -1;
        }




    }


    public function view_payment_total(){
        $payment_query = "SELECT SUM(amount) AS paid_fees FROM payments;";
        $stmt_payment = $this->connection->prepare($payment_query);
        $stmt_payment->execute();

        return $stmt_payment->fetch();
    }









}
