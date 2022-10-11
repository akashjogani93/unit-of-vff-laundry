





<?php
include('connect.php');
if(isset($_GET['invoice']))
{
    



            
        $orderId2 = $_GET['invoice'];
        $date=date('Y-m-d');
        //echo $date;
        $q="UPDATE `couterorder` SET `status`='4' WHERE `coId` ='$orderId2';";
        $conf=mysqli_query($conn,$q);
        $que="INSERT INTO `invoice`(`coId`,`date`)VALUES('$orderId2','$date')";
        $co=mysqli_query($conn,$que);
        //header('Location: byWalking.php');
        header('Location: complet_invoice.php?invoice='.$orderId2.'');
}
    

?>