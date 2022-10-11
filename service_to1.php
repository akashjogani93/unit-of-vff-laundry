
<?php


require_once('connect.php');

$product = $_POST['product'];
$ser = $_POST['ser'];


$sql = "SELECT price FROM pricing WHERE items='$product' AND services='$ser'";


$a = array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($a,$row['price']);
    }
}
echo json_encode($a);
mysqli_close($conn);
?>