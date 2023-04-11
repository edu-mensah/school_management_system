<?php

require_once('Person.php');


class Administrstor extends Person
{

    private $admin_id;


    function __construct($database_connection)
    {
        $this->connection = $database_connection;
    }


    public function add_administrator($admin_id,$last_name,$first_name,$other_names,$email,$phone_number,$birth_date,$gender,$res_address,$hire_date,$profile_picture,$password = 'ad12345' ){
        
        $this->admin_id = $admin_id;
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
        $this->profile_picture  = $profile_picture;


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


        $add_administrator_query = "INSERT INTO `administrators`(`admin_id`, `last_name`, `first_name`, `other_names`, `email`, `phone_number`, `birth_date`, `gender`, `res_address`, `pass_word`, `hire_date`, `profile_picture`) VALUES (:admin_id,:last_name,:first_name,:other_names,:email,:phone_number,:birth_date,:gender,:res_address,:pass_word,:hire_date,:course_id,:profile_picture);";

        $stmt = $this->connection->prepare($add_administrator_query);
        $add_result = $stmt->execute(['admin_id' => $this->admin_id, 'last_name' => $this->last_name, 'first_name' => $this->first_name ,'other_names' => $this->other_names, 'email' => $this->email, 'phone_number' => $this->phone_number, 'birth_date' =>$this->birth_date, 'gender' => $this->gender, 'res_address' => $this->res_address, 'pass_word' => $this->password, 'hire_date' => $this->hire_date, 'profile_picture' => $this->profile_picture ]);

        if ($add_result) {
            return true;
        } else {
            return -1;
        }

    }







    public function delete_administrator($admin_id){
        $instructor_id = trim($admin_id);

        if (empty($admin_id)) {
            return 0;
        }

        $delete_query = "DELETE FROM administrators WHERE admin_id = :admin_id;";
        $stmt_delete = $this->connection->prepare($delete_query);

        if ($stmt_delete->execute(['admin_id' => $admin_id])) {
            return true;
        } else{
            return -1;
        }

    }

    



        public function view_all_administrators(){
        $view_all_query = "SELECT * FROM administrators;";
        $stmt_all = $this->connection->prepare($view_all_query);

        if ($stmt_all->execute()) {
            $administrators = $stmt_all->fetchAll();
            return $administrators;
        }
    }






    



}
