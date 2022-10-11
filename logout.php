<?php
    include('connect.php');
    unset($_SESSION['Is_Login']);
    
        echo "<script>window.location='index.php';</script>";
        die();
    
?>