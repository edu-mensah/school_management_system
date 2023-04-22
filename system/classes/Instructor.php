<?php

require_once('Person.php');


class Instructor extends Person
{

    private $instructor_id;
    private $course_id;


    function __construct($database_connection)
    {
        $this->connection = $database_connection;
    }


    public function add_instructor($instructor_id,$last_name,$first_name,$other_names,$email,$phone_number,$birth_date,$gender,$res_address,$hire_date,$course_id,$profile_picture,$password = 'ins12345' ){
        
        $this->instructor_id = $instructor_id;
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
        $this->profile_picture  = $profile_picture;

       

        $add_instructor_query = "INSERT INTO `instructors`(`instructor_id`, `last_name`, `first_name`, `other_names`, `email`, `phone_number`, `birth_date`, `gender`, `res_address`, `pass_word`, `hire_date`, `course_id`, `profile_picture`) VALUES (:instructor_id,:last_name,:first_name,:other_names,:email,:phone_number,:birth_date,:gender,:res_address,:pass_word,:hire_date,:course_id,:profile_picture);";

        $stmt = $this->connection->prepare($add_instructor_query);
        $add_result = $stmt->execute(['instructor_id' => $this->instructor_id, 'last_name' => $this->last_name, 'first_name' => $this->first_name ,'other_names' => $this->other_names, 'email' => $this->email, 'phone_number' => $this->phone_number, 'birth_date' =>$this->birth_date, 'gender' => $this->gender, 'res_address' => $this->res_address, 'pass_word' => $this->password, 'hire_date' => $this->hire_date, 'course_id' => $this->course_id, 'profile_picture' => $this->profile_picture ]);

        if ($add_result) {
            return true;
        } else {
            return -1;
        }

    }







    public function delete_instructor($instructor_id){
        $instructor_id = trim($instructor_id);


        $delete_query = "DELETE FROM instructors WHERE instructor_id = :instructor_id;";
        $stmt_delete = $this->connection->prepare($delete_query);

        if ($stmt_delete->execute(['instructor_id' => $instructor_id])) {
            return true;
        } else{
            return -1;
        }

    }

    



        public function view_all_instructors(){
        $view_all_query = "SELECT * FROM instructors;";
        $stmt_all = $this->connection->prepare($view_all_query);
        $stmt_all->execute();
         
        return $stmt_all;
        
    }



    public function change_instrutor_course($course_id,$insructor_id){
        $update_query = "UPDATE instructors SET course_id = $course_id WHERE instructor_id = $insructor_id;";
        $stmt_update = $this->connection->prepare($update_query);

        if ($stmt_update) {
            return true;
        } else {
            return -1;
        }
    }






    



}
