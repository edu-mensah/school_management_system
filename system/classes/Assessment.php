
<?php

class Assessment
{
    private $connection;
    private $student_id;
    private $module_id;
    private $quiz_mark;
    private $exams_mark;


    function __construct($database_connection)
        {
            $this->connection = $database_connection;
        }
    

    public function record_quiz($student_id, $module_id,$quiz_mark){
        $this->student_id = trim($student_id);
        $this->module_id = trim($module_id);
        $this->quiz_mark = doubleval(trim($quiz_mark));

        if (empty($this->quiz_mark)) {
            return 0;
        }


        $select_query = "SELECT * FROM assessments WHERE student_id = $this->student_id AND module_id = $this->module_id;";
        $stmt_select = $this->connection->prepare($select_query);
        $stmt_select->execute();
        $row_count = $stmt_select->rowCount();

        if ($row_count > 0) {
            $update_query = "UPDATE assessments SET quiz_mark = :quiz_mark WHERE student_id = $this->student_id AND module_id = $this->module_id;";
            $stmt_update = $this->connection->prepare($update_query);
            if($stmt_update->execute(['quiz_mark' => $this->quiz_mark])){
                return true;
            }else {
                return -1;
            }


        } else {
            $record_quiz_query = "INSERT INTO `assessments`(`student_id`, `module_id`, `quiz_mark`) VALUES (:student_id,:module_id,:quiz_mark); ";
            $stmt_insert = $this->connection->prepare($record_quiz_query);

            if ($stmt_insert->execute(['student_id' => $this->student_id, 'module_id' => $this->module_id, 'quiz_mark' => $this->quiz_mark])) {
                return true;
            } else{
                return -1;
            }
        }


    }



    public function record_exams($student_id, $module_id,$exams_mark){
        $this->student_id = trim($student_id);
        $this->module_id = trim($module_id);
        $this->exams_mark = doubleval(trim($exams_mark));

        if (empty($this->exams_mark)) {
            return 0;
        }


        $select_query = "SELECT * FROM assessments WHERE student_id = $this->student_id AND module_id = $this->module_id;";
        $stmt_select = $this->connection->prepare($select_query);
        $stmt_select->execute();
        $row_count = $stmt_select->rowCount();

        if ($row_count > 0) {
            $update_query = "UPDATE assessments SET exams_mark = :exams_mark WHERE student_id = $this->student_id AND module_id = $this->module_id;";
            $stmt_update = $this->connection->prepare($update_query);
            if($stmt_update->execute(['exams_mark' => $this->exams_mark])){
                return true;
            }else {
                return -1;
            }


        } else {
            $record_quiz_query = "INSERT INTO `assessments`(`student_id`, `module_id`, `exams_mark`) VALUES (:student_id,:module_id,:exams_mark); ";
            $stmt_insert = $this->connection->prepare($record_quiz_query);

            if ($stmt_insert->execute(['student_id' => $this->student_id, 'module_id' => $this->module_id, 'exams_mark' => $this->exams_mark])) {
                return true;
            } else{
                return -1;
            }
        }


    }






     public function change_quiz_marks($student_id, $module_id,$quiz_mark){
        $this->student_id = trim($student_id);
        $this->module_id = trim($module_id);
        $this->quiz_mark = doubleval(trim($quiz_mark));

        if (empty($this->quiz_mark)) {
            return 0;
        }

            $update_query = "UPDATE assessments SET quiz_mark = :quiz_mark WHERE student_id = $this->student_id AND module_id = $this->module_id;";
            $stmt_update = $this->connection->prepare($update_query);
            if($stmt_update->execute(['quiz_mark' => $this->quiz_mark])){
                return true;
            }else {
                return -1;
            }


        }






    public function change_exams_marks($student_id, $module_id,$exams_mark){
        $this->student_id = trim($student_id);
        $this->module_id = trim($module_id);
        $this->exams_mark = doubleval(trim($exams_mark));

        if (empty($this->exams_mark)) {
            return 0;
        }


            $update_query = "UPDATE assessments SET exams_mark = :exams_mark WHERE student_id = $this->student_id AND module_id = $this->module_id;";
            $stmt_update = $this->connection->prepare($update_query);
            if($stmt_update->execute(['exams_mark' => $this->exams_mark])){
                return true;
            }else {
                return -1;
            }


    }







    public function delete_assessment($student_id, $module_id){
        $this->student_id = $student_id;
        $this->module_id = $module_id;

        $delete_query = "DELETE FROM assessments WHERE student_id = $this->student_id AND module_id = $this->module_id;";
        $stmt_delete = $this->connection->prepare($delete_query);

            if($stmt_delete->execute()){
                return true;
            }else {
                return -1;
            }

    }




    public function view_all_assessments(){
        $select_query = "SELECT * FROM assessments;";
        $stmt_select = $this->connection->prepare($select_query);
        $stmt_select->execute();

        return $stmt_select;
       


    }


    public function view_one_assessment($student_id, $module_id){
        $this->student_id = $student_id;
        $this->module_id = $module_id;

        $select_query = "SELECT * FROM assessments WHERE student_id = $this->student_id AND module_id = $this->module_id ;";
        $stmt_select = $this->connection->prepare($select_query);
        $stmt_select->execute();

        return $stmt_select;
       
    }


    





}
