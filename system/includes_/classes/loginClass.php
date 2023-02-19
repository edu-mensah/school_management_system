<?php

class Login{
    private $email_or_id;
    private $password;

    public function __construct($email, $password)
    {
        $this->email_or_id = $email;
        $this->password = $password;
    }



    public function sanitizeEmailInput(){
        trim(htmlentities(htmlspecialchars(stripslashes(strtolower($this->email_or_id)))));
        return $this->email_or_id;
    }

    public function sanitizePasswordInput(){
        trim(htmlentities(htmlspecialchars(stripslashes($this->password))));
        return $this->password;
    }

    public function isEmailEmpty(){
        $boolOutput = empty($this->email_or_id);
        return $boolOutput;
    }

    public function isPasswordEmpty(){
        $boolOutput = empty($this->password);
        return $boolOutput;
    }

    public function getEmail(){
        return $this->email_or_id;
    }

}