<?php


require_once('../../connect.php');

$pdnam=$_POST['wingname'];



$sql="SELECT * FROM `customer` WHERE `cid`='$pdnam' limit 1";


$a = array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($a,$row);
    }
}
echo json_encode($a);
mysqli_close($conn);
?>