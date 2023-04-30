<?php

class Batch
{

    private $connection;
    private $batch_id;
    private $batch_name;
    private $start_date;
    private $completion_date;
    private $class_time;
    private $insructor_id;
    private $completion_status;

    public function __construct($database_connection){
        $this->connection = $database_connection;
    }


    public function create_batch($batch_id,$batch_name,$start_date,$completion_date,$class_time,$insructor_id,$completion_status = 'no'){
        $this->batch_id = trim($batch_id);
        $this->batch_name = trim($batch_name);
        $this->start_date = trim($start_date);
        $this->completion_date =trim($completion_date);
        $this->insructor_id = trim($insructor_id);
        $this->class_time = trim($class_time);
        $this->completion_status = trim($completion_status);

       

        $create_batch_query = "INSERT INTO `batches`(`batch_id`, `batch_name`,`start_date`, `completion_date`, `instructor_id`,`class_time`,`completion_status`) VALUES (:batch_id,:batch_name,:startDate,:completion_date,:instructor_id, :class_time, :completion_status);";
        $stmt_create_batch = $this->connection->prepare($create_batch_query);
        if ($stmt_create_batch->execute(['batch_id' => $this->batch_id, 'batch_name' => $batch_name ,'startDate' => $this->start_date, 'completion_date' => $this->completion_date, 'instructor_id' => $this->insructor_id, 'class_time' => $this->class_time, 'completion_status' => $this->completion_status])) {
            return true;
        } else {
            return -1;
        }



    }




    public function delete_batch($batch_id){
        $delete_batch_query = "DELETE FROM `batches` WHERE batch_id = $batch_id;";
        $stmt_delete = $this->connection->prepare($delete_batch_query);
        
        if ($stmt_delete->execute()) {
            return true;
        } else{
            return -1;
        }
    }





    public function set_batch_completion_status($batch_id,$completion_status){
        $batch_id = trim($batch_id);
        $completion_status = trim(htmlspecialchars($completion_status));


        $set_status_query = "UPDATE `batches` SET completion_status = :completion_status WHERE batch_id = :batch_id;";
        $stmt_set_status = $this->connection->prepare($set_status_query);

        if ($stmt_set_status->execute(['completion_status' => $completion_status, 'batch_id' => $batch_id])) {
            return true;
        } else {
            return -1;
        }
    }



    public function change_batch_class_time($batch_id,$class_time){
        $batch_id = trim($batch_id);
        $class_time = trim(htmlspecialchars($class_time));



        $change_time_query = "UPDATE `batches` SET class_time = :class_time WHERE batch_id = :batch_id;";
        $stmt_change_time = $this->connection->prepare($change_time_query);

        if ($stmt_change_time->execute(['class_time' => $class_time, 'batch_id' => $batch_id])) {
            return true;
        } else {
            return -1;
        }


    }




    public function change_start_date($batch_id,$start_date){
        $batch_id = trim($batch_id);
        $start_date = trim(htmlspecialchars($start_date));


    
        $change_date_query = "UPDATE `batches` SET `start_date` = :startDate WHERE batch_id = :batch_id;";
        $stmt_change_date = $this->connection->prepare($change_date_query);

        if ($stmt_change_date->execute(['startDate' => $start_date, 'batch_id' => $batch_id])) {
            return true;
        } else {
            return -1;
        }


    }





    public function change_completion_date($batch_id,$completion_date){
        $batch_id = trim($batch_id);
        $completion_date = trim(htmlspecialchars($completion_date));


        $change_date_query = "UPDATE `batches` SET `completion_date` = :completion_date WHERE batch_id = :batch_id;";
        $stmt_change_date = $this->connection->prepare($change_date_query);

        if ($stmt_change_date->execute(['completion_date' => $completion_date, 'batch_id' => $batch_id])) {
            return true;
        } else {
            return -1;
        }



    }





    public function change_batch_instructor($batch_id,$instructor_id){
        $batch_id = trim($batch_id);
        $instructor_id = trim(htmlspecialchars($instructor_id));




        $change_instructor_query = "UPDATE `batches` SET `instructor_id` = :instructor_id WHERE batch_id = :batch_id;";
        $stmt_change_instructor = $this->connection->prepare($change_instructor_query);

        if ($stmt_change_instructor->execute(['instructor_id' => $instructor_id, 'batch_id' => $batch_id])) {
            return true;
        } else {
            return -1;
        }
    }



    public function view_all_batches(){
        $select_query = "SELECT * FROM `batches`;";
        $stmt_select = $this->connection->prepare($select_query);
        $stmt_select->execute();

        
        return $stmt_select;
        
    }







    
}
