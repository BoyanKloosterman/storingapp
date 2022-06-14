<?php 
    session_start();
    session_destroy();
    header("location: ../meldingen/index.php");
    exit;
?>