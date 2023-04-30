<?php


include_once('../database_connection/connection_instance.php');
include_once('../functions/functions.php');




if (isset($_POST['inrease_quantity'])) {

    $quantity = validate_text_input($_POST['quantity']);
    $book_id = $_POST['book_id'];


    $update_query = "UPDATE `books` SET quantity = quantity + :quantity WHERE book_id = :book_id;";
    $stmt_update = $connection->prepare($update_query);


    if($stmt_update->execute(['book_id' => $book_id, 'quantity' => $quantity])){
        header("Location: ../portal/books.php?success=Quantity increased");
        exit();
    } else {
        header("Location: ../portal/books.php?error=Something went wrong. Please try again");
        exit();
    }




} else {
    header("Location: ../portal/books.php");
    exit();
}