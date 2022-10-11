
<?php
require_once('../connect.php');
$qry6="TRUNCATE `tempaddon`;";
$cfm6 = mysqli_query($conn,$qry6);
$qry7="TRUNCATE `tempproduct`;";
$cfm7 = mysqli_query($conn,$qry7);
header("Location: order_add.php");
?>


        



