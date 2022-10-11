<?php
require_once('../connect.php');

if(isset($_POST['request']))
{
    $request = $_POST['request'];

    // multiple order status change
    if($request=='cheakedNewOrders'){
        $newOrderIds = $_POST['newOrderIds'];
        foreach ($newOrderIds as $orderId) {
        $q="UPDATE `couterorder` SET `status`='1' WHERE `coId` ='$orderId';";
        $conf=mysqli_query($conn,$q);
        }
        echo "New Orders Added TO Process";
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
        foreach ($newOrderIds1 as $orderId1) {
        $q="UPDATE `couterorder` SET `status`='2' WHERE `coId` ='$orderId1';";
        $conf=mysqli_query($conn,$q);
        }
        echo "Orders Ready For Delevery";
    }

    // single order change
    if($request1=='oneNewOrders1'){
        $orderId1 = $_POST['newOrderIds1'];
        $q="UPDATE `couterorder` SET `status`='2' WHERE `coId` ='$orderId1';";
        $conf=mysqli_query($conn,$q);
        echo "Orders Ready For Delevery";

}
}
    

?>



