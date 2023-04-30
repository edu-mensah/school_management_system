<?php

include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');



if (isset($_POST['delete'])) {

    $instructor_id = $_POST['book_id'];


    $delete_query = "DELETE FROM books WHERE book_id = :book_id;";
    $stmt_del = $connection->prepare($delete_query);



    if($stmt_del->execute(['book_id' => $book_id])){
        header("Location: ../portal/books.php?success=Book deleted.");
        exit();
    } else {
        header("Location: ../portal/books.php?error=Something went wrong. Please try again.");
        exit();
    }




}else {
    header("Location: ../portal/books.php");
}