<?php
require_once('../classes/Person.php');


class Student extends Person 
{

    private $student_id;
    private $course_id;
    private $guardian_name;
    private $guardian_contact;
    private $batch_id;





    function __construct($database_connection)
    {
        $this->connection = $database_connection;
    }




    public function add_student($student_id,$last_name,$first_name,$other_names,$email,$phone_number,$birth_date,$gender,$res_address,$hire_date,$course_id,$profile_picture,$guardian_name,$guardian_contact,$batch_id,$password = 'st12345' ){
        
        $this->student_id = $student_id;
        $this->last_name = $this->sanitize_input($last_name);
        $this->first_name = $this->sanitize_input($first_name);
        $this->other_names = $this->sanitize_input($other_names);
        $this->email = $this->sanitize_input($email);
        $this->phone_number = $this->sanitize_input($phone_number);
        $this->birth_date = $this->sanitize_input($birth_date);
        $this->gender = $this->sanitize_input($gender);
        $this->res_address = $this->sanitize_input($res_address);
        $this->password = password_hash($password,PASSWORD_DEFAULT);
        $this->hire_date = $this->sanitize_input($hire_date);
        $this->course_id = $course_id;
        $this->batch_id = $batch_id;
        $this->profile_picture  = $this->sanitize_input($profile_picture);
        $this->guardian_name  = $this->sanitize_input($guardian_name);
        $this->guardian_contact  = $this->sanitize_input($guardian_contact);


        if (empty($this->last_name)) {
            return 0;
        }

        if (empty($this->first_name)) {
            return 1;
        }

        if (empty($this->email)) {
            return 2;
        }

        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL)) {
            return 3;
        }

        if (empty($this->phone_number)) {
            return 4;
        }

        if (empty($this->birth_date)) {
            return 5;
        }

        if (empty($this->gender)) {
            return 6;
        }

        if (empty($this->res_address)) {
            return 7;
        }

        if (empty($this->profile_picture)) {
            return 8;
        }


        $add_student_query = "INSERT INTO `students`(`student_id`, `last_name`, `first_name`, `other_names`, `email`, `phone_number`, `birth_date`, `gender`, `res_address`, `pass_word`, `guardian_name`, `guardian_contact`, `batch_id`, `course_id`, `profile_picture`) VALUES (:student_id,:last_name,:first_name,:other_names,:email,:phone_number,:birth_date,:gender,:res_address,:pass_word,:guardian_name,:guardian_contact,:batch_id,:course_id,:profile_picture);";

        $stmt = $this->connection->prepare($add_student_query);
        $add_result = $stmt->execute(['student_id' => $this->student_id, 'last_name' => $this->last_name, 'first_name' => $this->first_name ,'other_names' => $this->other_names, 'email' => $this->email, 'phone_number' => $this->phone_number, 'birth_date' =>$this->birth_date, 'gender' => $this->gender, 'res_address' => $this->res_address, 'pass_word' => $this->password, 'guardian_name' => $this->guardian_name, 'course_id' => $this->course_id, 'profile_picture' => $this->profile_picture, 'guardian_contact' => $this->guardian_contact, 'batch_id' => $this->batch_id ]);

        if ($add_result) {
            return true;
        } else {
            return -1;
        }

    }





        public function delete_student($student_id){
        $student_id = trim($student_id);

        if (empty($student_id)) {
            return 0;
        }

        $delete_query = "DELETE FROM students WHERE student_id = :student_id;";
        $stmt_delete = $this->connection->prepare($delete_query);

        if ($stmt_delete->execute(['student_id' => $student_id])) {
            return true;
        } else{
            return -1;
        }

    }



    public function view_all_students(){
        $view_all_query = "SELECT * FROM students;";
        $stmt_all = $this->connection->prepare($view_all_query);

        if ($stmt_all->execute()) {
            $students = $stmt_all->fetchAll();
            return $students;
        }
    }





    public function change_student_course($course_id,$student_id){
        $update_query = "UPDATE students SET course_id = $course_id WHERE student_id = $student_id;";
        $stmt_update = $this->connection->prepare($update_query);

        if ($stmt_update) {
            return true;
        } else {
            return -1;
        }
    }



        public function change_student_batch($batch_id,$student_id){
        $update_query = "UPDATE students SET batch_id = $batch_id WHERE student_id = $student_id;";
        $stmt_update = $this->connection->prepare($update_query);

        if ($stmt_update) {
            return true;
        } else {
            return -1;
        }
    }













    
}
