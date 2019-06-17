<?php

if(isset($_GET["logout"])){
    $val = $_GET["logout"];
    if($val == "yes"){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit;
        
    }
}