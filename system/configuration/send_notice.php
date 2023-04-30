<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['send_notice'])) {
    
    $notice_head = validate_text_input($_POST['notice_head']);
    $notice_body = validate_text_input($_POST['notice_body']);
    $notice_by = validate_text_input($_POST['notice_by']);
    $notice_to = validate_text_input($_POST['notice_to']);



    $notice_data = 'notice_head=' . $notice_head . '&notice_body=' . $notice_body . '&notice_to=' . $notice_to;


 


     if (empty($notice_head)) {
        header("Location: ../portal/notice.php?notice_head_error=Enter a notice header.&$notice_data");
        exit();
    }


    if (empty($notice_body)) {
        header("Location: ../portal/notice.php?notice_body_error=Enter notice body.&$notice_data");
        exit();
    }



    if (empty($notice_to)) {
        header("Location: ../portal/notice.php?notice_to_error=Select the reciever.&$notice_data");
        exit();        
    }



    $notice_insert_query = "INSERT INTO `notice`( `notice_header`, `notice_body`, `notice_by`, `notice_to`) VALUES (:notice_head,:notice_body,:notice_by,:notice_to);";
    $stmt = $connection->prepare($notice_insert_query);
    

    if($stmt->execute(['notice_head' => $notice_head, 'notice_body' => $notice_body, 'notice_by' => $notice_by, 'notice_to' => $notice_to ])){
        header("Location: ../portal/notice.php?success=Notice sent");
        exit();
    } else {
        header("Location: ../portal/notice.php?error=Something went wrong. Please try again&$notice_data");
        exit();
    }









} else {
    header("Location: ../portal/notice.php");
    exit();
}