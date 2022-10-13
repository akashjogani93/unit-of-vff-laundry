<?php
require_once('../connect.php');

if(isset($_POST['request']))
{
    $request = $_POST['request'];

    // multiple order status change
    if($request=='cheakedNewOrders'){
        $newOrderIds = $_POST['newOrderIds'];
        $delivey = $_POST['delivey'];
        $bid = $_POST['bid'];
        $date = $_POST['date'];

        foreach ($newOrderIds as $orderId) 
        {
            $q="INSERT INTO `order_asign`(`did`,`coId`,`bid`,`date`,`status`)VALUES('$delivey','$orderId','$bid','$date','Delivery')";
            $conf=mysqli_query($conn,$q);
            if($conf)
            {
                $query="UPDATE `couterorder` SET `status`='3' WHERE `coId` ='$orderId';";
                $conf1=mysqli_query($conn,$query);
            }
            
        }
        echo "Order Asigned For Delivery Boy";
    }

    // single order change
    if($request=='oneNewOrders'){
        $orderId = $_POST['newOrderIds'];
        $q="UPDATE `couterorder` SET `status`='1' WHERE `coId` ='$orderId';";
        $conf=mysqli_query($conn,$q);
        echo "New Orders Added TO Process";
    }
}
?>




<?php
require_once('../connect.php');

if(isset($_POST['request1']))
{
    $request1 = $_POST['request1'];

    // multiple order status change
    if($request1=='cheakedNewOrders1'){
        $newOrderIds1 = $_POST['newOrderIds1'];
        $delivey1 = $_POST['delivey1'];
        $bid1 = $_POST['bid1'];
        $date1 = $_POST['date1'];

        foreach ($newOrderIds1 as $orderId1) 
        {
            $q="INSERT INTO `order_asign`(`did`,`coId`,`bid`,`date`,`status`)VALUES('$delivey1','$orderId1','$bid1','$date1','Pickup')";
            $conf=mysqli_query($conn,$q);
            if($conf)
            {
                $query="UPDATE `couterorder` SET `status`='11' WHERE `coId` ='$orderId1';";
                $conf1=mysqli_query($conn,$query);
            }
            
        }
        echo "Orders Asigned For Pickuped";
    }

    // single order change
    // if($request=='oneNewOrders'){
    //     $orderId = $_POST['newOrderIds'];
    //     $q="UPDATE `couterorder` SET `status`='1' WHERE `coId` ='$orderId';";
    //     $conf=mysqli_query($conn,$q);
    //     echo "New Orders Added TO Process";
    // }
}
?>



<?php
require_once('../connect.php');

if(isset($_POST['dele']))
{
    $dele = $_POST['dele'];
    $qry1="DELETE FROM `tempproduct` WHERE `tpid`='$dele'";
    $conf=mysqli_query($conn,$qry1);
    $qry2="DELETE FROM `tempaddon` WHERE `tpid`='$dele'";
    $conf=mysqli_query($conn,$qry2);
    echo "Deleted";
}



?>