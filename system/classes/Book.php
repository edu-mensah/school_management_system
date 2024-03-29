<?php

class Book
{
    private $connection;
    private $book_id;
    private $book_title;
    private $quantity;


    public function __construct($database_connection)
    {
        $this->connection = $database_connection;
    }



    public function add_book($book_id,$book_title,$quantity){
        $this->book_id = trim($book_id);
        $this->book_title =trim($book_title);
        $this->quantity = trim(intval($quantity));

        


        $add_book_query = "INSERT INTO `books`(`book_id`, `book_title`, `quantity`) VALUES (':book_id',:book_title,:quantity);";
        $stmt_add_book = $this->connection->prepare($add_book_query);
        
        if ($stmt_add_book->execute(['book_id' => $this->book_id, 'book_title' => $this->book_title, 'quantity' => $this->quantity])) {
            return true;
        } else {
            return -1;
        }

    }



    public function increase_book_quantity($book_id,$quantity){
        $quantity = trim(intval($quantity));

       


        $book_qty_query = "UPDATE books SET quantity = quantity + :quantity WHERE book_id = $book_id;";
        $stmt_qty = $this->connection->prepare($book_qty_query);

        if ($stmt_qty->execute(['quantity' => $quantity])) {
            return true;
        } else {
            return -1;
        }


    }





    public function view_all_books(){
        $select_all = "SELECT * FROM books;";
        $stmt_select_all = $this->connection->prepare($select_all);
        $stmt_select_all->execute();

        return $stmt_select_all;

    }


     public function view_books_in_stock(){
        $select = "SELECT SUM(quantity) AS book_stock FROM books;";
        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        return $stmt->fetch();

    }   





    public function delete_book($book_id){
        $book_id = trim($book_id);

        $delete_book_query = "DELETE FROM books WHERE book_id = $book_id;";
        $stmt_delete = $this->connection->prepare($delete_book_query);

        if ($stmt_delete->execute()) {
            return true;
        } else {
            return -1;
        }
    }





    
}
