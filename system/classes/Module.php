<?php

class Module
{
    private $connection;
    private $module_id;
    private $module_title;
    private $course_id;


    public function __construct($database_connection){
        $this->connection = $database_connection;
    }



    public function add_module($module_id,$module_title,$course_id){
        $this->module_id = trim(htmlspecialchars($module_id));
        $this->module_title = trim(htmlspecialchars($module_title));
        $this->course_id = trim(htmlspecialchars($course_id));

        if (empty($module_id)) {
            return 0;
        } 

        if ($module_title) {
            return 1;
        }


        $add_module_query = "INSERT INTO `modules`(`module_id`, `module_tilte`, `course_id`) VALUES (:module_id,:module_title,':course_id);";
        $stmt_add_module = $this->connection->prepare($add_module_query);

        if ($stmt_add_module->execute(['module_id' => $this->module_id, 'module_title' => $this->module_title, 'course_id' => $this->course_id ])) {
            return true; 
        } else {
            return -1;
        }

    }





    public function delete_module($module_id){
        $del_module_query = "DELETE FROM modules WHERE module_id = $module_id;";
        $stmt_del_module = $this->connection->prepare($del_module_query);

        if ($stmt_del_module->execute()) {
            return true;
        } else {
            return -1;
        }
    }



    public function view_all_modules(){
        $select_all_query = "SELECT * FROM modules;";
        $stmt_all = $this->connection->prepare($select_all_query);

        if ($stmt_all->execute()) {
            $modules = $stmt_all->fetchAll();
            return $modules;
        } else {
            return-1;
        }
    }












}
