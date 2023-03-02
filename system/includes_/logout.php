<?php
session_start();
session_unset();
session_destroy();

define("ROOTDIR", dirname("/school_management_system/system"));


header("Location:" . ROOTDIR . "/index.php");
exit();