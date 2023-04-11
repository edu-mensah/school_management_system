<?php 
class Login 
{
    private $database_connection;
    private $email_or_school_id;
    private $password;



    public function __construct($databaseConnection, $email_or_id,$passWord){
        $this->database_connection = $databaseConnection;
        $this->email_or_school_id = $email_or_id;
        $this->password = $passWord;
    }


    // Get User (student, Instructor, or Administrstor)
    public function get_user_details($table,$column){

            ## Making database fetch
            $user_select_query = "SELECT * FROM $table WHERE email = :email || $column = :id";
            
            // Statement student
            $stmt_user = $this->database_connection->prepare($user_select_query);
            $stmt_user->execute(['email' => $this->email_or_school_id, 'id' => $this->email_or_school_id]);


        return $stmt_user;

    }




    
}
