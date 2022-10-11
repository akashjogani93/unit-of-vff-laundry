<?php


require_once('../../connect.php');


$pdnam = $_POST['service'];


$sql = "SELECT `kgRate` FROM `services` WHERE `title` = '$pdnam'";

$a = array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($a,$row['kgRate']);
    }
}
echo json_encode($a);
mysqli_close($conn);
?>

