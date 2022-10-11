<?php


require_once('../connect.php');


$bid = $_POST['bid'];


$sql = "SELECT `id`,`full` FROM `staff` WHERE `bid` = '$bid' AND `des`='Delevery Boy' AND `status`='inactive'";

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

