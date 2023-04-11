<?php

class Person 
{
    protected $first_name;
    protected $last_name;
    protected $other_names;
    protected $email;
    protected $phone_number;
    protected $res_address;
    protected $birth_date;
    protected $hire_date;
    protected $gender;
    protected $password;
    protected $profile_picture;
    protected $connection;




    public function change_password($table,$email,$new_password,$confirm_new_password){
        $new_password = trim(htmlspecialchars($new_password));
        $confirm_new_password = trim(htmlspecialchars($confirm_new_password));

        if (empty($new_password)) {
            return 0;
        } elseif (empty($confirm_new_password)) {
            return 1;
        } elseif ($new_password != $confirm_new_password) {
            return 2;
        }

        $new_password = password_hash($new_password,PASSWORD_DEFAULT);

        $update_query = "UPDATE $table SET `pass_word` = :new_password WHERE email = $email;";
        $stmt_update = $this->connection->prepare($update_query);
        if ($stmt_update->execute(['new_password' => $new_password])){
            return true;
        } else{
            return -1;
        }
            


    }



    public function change_phone_number($table,$email,$new_phone_number){
        $new_phone_number = trim(htmlspecialchars($new_phone_number));

        if (empty($new_phone_number)) {
            return 0;
        }


        $update_query = "UPDATE $table SET `phone_number` = :new_phone_number WHERE email = $email;";
        $stmt_update = $this->connection->prepare($update_query);
        if ($stmt_update->execute(['new_phone_number' => $new_phone_number])){
            return true;
        } else{
            return -1;
        }
            


    }



    public function sanitize_input($input){
        $input = trim(htmlspecialchars(strip_tags($input))); 
        return $input;
    }







}
