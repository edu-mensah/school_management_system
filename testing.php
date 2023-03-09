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
