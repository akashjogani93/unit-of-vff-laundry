<?php
require_once('../connect.php');

$orderUnit = $_POST['orderUnit'];
$pid = $_POST['pid'];
$productQuantity = $_POST['productQuantity'];
$productWeight = $_POST['productWeight'];
$productRate = $_POST['productRate'];
$productAmount = $_POST['productAmount'];
$remark = $_POST['remark'];

$addons = $_POST['addons'];



$sql = "SELECT * FROM `tempproduct` WHERE `pid`='$pid' AND `unit`='$orderUnit';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) <= 0) {

    $q="INSERT INTO `tempproduct`(`unit`, `pid`, `pqty`, `weight`, `rate`, `amount`, `remark`) VALUES 
    ('$orderUnit','$pid','$productQuantity','$productWeight','$productRate','$productAmount','$remark');";
    $conform=mysqli_query($conn,$q);
    if($conform)
    {
        $q1="SELECT `tpid` FROM `tempproduct` ORDER BY `tpid` DESC LIMIT 1;";
        $cfm=mysqli_query($conn,$q1);
        $row=mysqli_fetch_array($cfm);

        foreach ($addons as $addon) {
            $q="INSERT INTO `tempaddon`(`tpid`, `pid`, `addon`, `rate`, `qty`, `total`) VALUES 
            ('$row[0]','$addon[0]','$addon[1]','$addon[2]','$addon[3]','$addon[4]');";
            $conf=mysqli_query($conn,$q);
        }
        echo "Item Added Successfully";
    }
}else{
    echo "Item Already exist";
}



?>