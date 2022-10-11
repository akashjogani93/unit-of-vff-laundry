<?php


require_once('../connect.php');


$addn = $_POST['addn'];


$sql = "SELECT `rate` FROM `addon` WHERE `addon` = '$addn'";

$a = array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($a,$row['rate']);
    }
}
echo json_encode($a);
mysqli_close($conn);
?>

