<?php
    session_start();
    include('connect.php');
    unset($_SESSION['Is_Login']);

    header('location:dashboard.php');
    die();
    
?>