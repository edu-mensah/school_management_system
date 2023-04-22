<?php

class Course
{
    private $connection;
    private $course_id;
    private $course_title;
    private $course_fee;


    public function __construct($database_connection){
        $this->connection = $database_connection;
    }




    public function add_course($course_id,$course_title,$course_fee){
        $course_id = trim(strip_tags(htmlspecialchars($course_id)));
        $course_title = trim(strip_tags(htmlspecialchars($course_title)));
        $course_fee = trim(strip_tags(htmlspecialchars(doubleval($course_fee))));


        $add_course_query = "INSERT INTO `courses`(`course_id`, `course_title`, `course_fee`) VALUES (:course_id,:course_title,:course_fee);";
        $stmt_add_course = $this->connection->prepare($add_course_query);

        if ($stmt_add_course->execute(['course_id' => $course_id, 'course_title' => $course_title, 'course_fee' => $course_fee])) {
            return true;
        } else {
            return -1;
        }


    }




    public function change_course_fee($course_id,$course_fee){
        $course_fee = trim(intval($course_fee));

        $change_fee_query = "UPDATE courses SET course_fee = :course_fee WHERE course_id = :course_id;";
        $stmt_change_fee = $this->connection->prepare($change_fee_query);

        if ($stmt_change_fee->execute(['course_fee' => $course_fee, 'course_id' => $course_id])) {
            return true;
        } else {
            return -1;
        }

    }




    public function delete_course($course_id){
        $del_course_query = "DELETE FROM courses WHERE course_id = $course_id;";
        $stmt_del_course = $this->connection->prepare($del_course_query);

        if ($stmt_del_course->execute()) {
            return true;
        } else {
            return -1;
        }
    }



    public function view_all_courses(){
        $select_all_query = "SELECT * FROM courses;";
        $stmt_all = $this->connection->prepare($select_all_query);
        $stmt_all->execute();

        return $stmt_all;

        
    }
 



    
}
