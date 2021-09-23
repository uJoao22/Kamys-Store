<?php
    session_start(); 
    unset($_SESSION["userKamys"]);
    header("location: ../index/index.php"); 
?>