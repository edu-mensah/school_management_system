<?php

class Database {


    private $severName = "localhost";
    private $userName = "root";
    private $password = "";
    private $database_name = "school_management_system_DB";
    private $connect;

    

    public function connection(){

        try {
            $this->connect = new PDO('mysql:host='.$this->severName.';dbname='.$this->database_name,$this->userName,$this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }

        return $this->connect;
    } 

}