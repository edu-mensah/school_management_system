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




    public function add_student($student_id,$last_name,$first_name,$other_names,$email,$phone_number,$birth_date,$gender,$res_address,$course_id,$profile_picture,$guardian_name,$guardian_contact,$batch_id,$password = 'stu12345' ){
        
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
        $this->course_id = $course_id;
        $this->batch_id = $batch_id;
        $this->profile_picture  = $this->sanitize_input($profile_picture);
        $this->guardian_name  = $this->sanitize_input($guardian_name);
        $this->guardian_contact  = $this->sanitize_input($guardian_contact);



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
        $stmt_all->execute();
            
        return $stmt_all;


    }


    public function view_fee_total(){
        $view_fee_query = "SELECT SUM(course_fee) AS fees_owed FROM students,courses WHERE students.course_id = courses.course_id;";
        $stmt = $this->connection->prepare($view_fee_query);
        $stmt->execute();
            
        return $stmt->fetch();
    }


    public function view_female_students(){
        $view_female_query = "SELECT COUNT(gender) AS females FROM students WHERE gender = 'female';";
        $stmt = $this->connection->prepare($view_female_query);
        $stmt->execute();
            
        return $stmt->fetch();        
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
