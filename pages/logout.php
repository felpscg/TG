<?php
new logout();
class logout {

    function __construct() {
        $root = $_SERVER['DOCUMENT_ROOT'];
        session_start();
        
        session_destroy();
        session_abort();
        header("location:./index.php");
    }

}
