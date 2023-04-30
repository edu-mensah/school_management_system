<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['record_book'])) {
    
    $book_id = validate_text_input($_POST['book_id']);
    $book_title = validate_text_input($_POST['book_title']);
    $quantity = intval(validate_text_input($_POST['quantity']));




    $book_data  = 'book_id=' . $book_id . '&book_title=' . $book_title . '&quantity=' . $quantity; 

     if (empty($book_id)) {
        header("Location: ../portal/books.php?book_id_error=Enter book ID.&$book_data");
        exit();
    }


    if (empty($book_title)) {
        header("Location: ../portal/books.php?book_title_error=Please enter book title.&$book_data");
        exit();
    }



    if (empty($quantity)) {
        header("Location: ../portal/books.php?quantity_error=Please enter book quantity.&$book_data");
        exit();
    }


   

    $insert_query = "INSERT INTO `books`(`book_id`, `book_title`, `quantity`) VALUES (:book_id,:book_title,:quantity);";
    $stmt = $connection->prepare($insert_query);
    


    if($stmt->execute(['book_id' => $book_id, 'book_title' => $book_title, 'quantity' => $quantity ])){
        header("Location: ../portal/books.php?success=Book recorded");
        exit();
    } else {
        header("Location: ../portal/books.php?error=Something went wrong. Please try again.&$book_data");
        exit();
    }









} else {
    header("Location: ../portal/books.php");
    exit();
}