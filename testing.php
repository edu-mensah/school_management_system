<?php

// include 'system/includes_/login_config.php';



// echo dirname("/school_management_system/system",1);
// echo ROOTDIR;

// echo "<br>";

// echo $_SERVER['DOCUMENT_ROOT'];

// echo "<br>";


// echo dirname(__FILE__);


$date_var = '20/03/2023';




$date_arr = (explode('/',$date_var));

var_dump($date_arr);
echo '<br>';

$arr_rev = array_reverse($date_arr);

echo '<br>';

$date_var = implode('-',$arr_rev);

echo $date_var;

echo '<br>';
echo mt_rand(1,999);
echo '<br>';


// function generate_account_id($account_type,$course_id){

//     $year = substr(date("Y"),2);
//     $random_number = rand(1,999);;
//     $account_id = $account_type . $random_number . $course_id . $year;

//     $defualt = "ST2GWD23";



//     if (strtoupper($account_type) === "ST") {
        
//         if ($defualt === $account_id) {
//             generate_account_id($account_type,$course_id);
//             exit();
//          }
//     }



//     if (strtoupper($account_type) === "IN") {

//         if ($defualt === $account_id) {
//             generate_account_id($account_type,$course_id);
//             exit();
//          }

        
//     }



    // if (strtoupper($account_type) === "AD") {
    //     $select_instructor_query = "SELECT * FROM a WHERE student_id = $account_id";
    //     $stmt_instructor = $DatabaseConnection->prepare($select_instructor_query);
    //     $stmt_instructor->execute();

    //     if ($stmt_instructor->rowCount() > 0) {
    //         generate_account_id($account_type,$course_id);
    //         exit();
    //      }
    // }




//     return $account_id;

    
// }

// echo generate_account_id("ST","GWD");