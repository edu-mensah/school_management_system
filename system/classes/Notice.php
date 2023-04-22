<?php

class Notice
{
    private $connection;
    private $notice_header;
    private $notice_body;
    private $notice_picture;
    private $notice_by;
    private $notice_to;




    public function __construct($database_connection){
        $this->connection = $database_connection;
    }




    public function send_notice($notice_header,$notice_body,$notice_picture,$notice_by,$notice_to){
        $this->notice_header = trim(htmlspecialchars($notice_header));
        $this->notice_body = trim(htmlspecialchars($notice_body));
        $this->notice_by = trim(htmlspecialchars($notice_by));
        $this->notice_to = trim(htmlspecialchars($notice_to));
        $this->notice_picture = $notice_picture;


       

        $create_notice_query = "INSERT INTO `notice`( `notice_header`, `notice_body`, `notice_picture`, `notice_by`, `notice_to`) VALUES (:notice_header,:notice_body,:notice_picture,:notice_by,:notice_to);";
        $stmt_create_notice = $this->connection->prepare($create_notice_query);

        if ($stmt_create_notice->execute(['notice_header' => $this->notice_header, 'notice_body' => $this->notice_body, 'notice_picture' => $this->notice_picture, 'notice_by' => $this->notice_by, 'notice_to' => $this->notice_to])) {
            return true;
        } else {
            return -1;
        }

    }



    public function delete_notice($notice_id){
        $del_notice_query = "DELETE FROM notice WHERE notice_id = $notice_id;";
        $stmt_del_notice = $this->connection->prepare($del_notice_query);

        if ($stmt_del_notice->execute()) {
            return true;
        } else {
            return -1;
        }


    }



    public function view_all_notice(){
        $select_all_query = "SELECT * FROM notice;";
        $stmt_all = $this->connection->prepare($select_all_query);
        $stmt_all->execute();
            
        return $stmt_all;


    }



  











}
