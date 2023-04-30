<?php

include_once '../database_connection/database_connection.php';





function format_date($date_text){
    $date_val = trim(strip_tags($date_text));
    $date_arr = (explode('/',$date_val));

    $date_arr = array_reverse($date_arr);

    $date_val = implode('-',$date_arr);

    return $date_val;
}





function validate_text_input($data){
    $data =  trim(htmlspecialchars($data));
    return $data;
}



function generate_account_id($account_type){


    $year = substr(date("Y"),2);
    $random_number = rand(1,999);;
    $account_id = $account_type . $random_number . '-' . $year;


    return $account_id;

    
}


// function get_balance($student_id){

//     #db 
//     $database = new Database();
//     $connection = $database->connection();


//     $query = "SELECT SUM(amount) as amount_paid FROM payments WHERE student_id = :student_id;";

//     $stmt = $connection->prepare($query);
//     $stmt->execute(['student_id' => $student_id]);
//     return $stmt->fetch();
// }