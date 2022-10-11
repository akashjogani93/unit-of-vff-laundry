<?php include("connect.php"); ?>

<?php
    $ser=$_POST['ser'];
    $query="SELECT `sid` FROM `services` WHERE `title`='$ser'";
    
$a = array();
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($a,$row['sid']);
    }
}
echo json_encode($a);
mysqli_close($conn);
?>