

<?php
include("connect.php");


if(isset($_POST['postSubmit']))
{
    $id=$_POST['id'];
    $ser=$_POST['service'];
    $item=$_POST['item'];
    $rate=$_POST['rate'];
    $query="INSERT INTO `products`(`pid`,`services`,`productName`,`unitRate`)VALUES('$id','$ser','$item','$rate');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        echo "<script>alert('Item Price Added successfully');</script>";
        echo '<script> window.location="pricing.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location="pricing.php"; </script>';
    }      

  
}


if(isset($_POST['postUpdate']))
{
    $id=$_POST['id'];
    $ser=$_POST['service'];
    $item=$_POST['item'];
    $rate=$_POST['rate'];
    $query="UPDATE `products` SET `pid`='$id',`services`='$ser',`productName`='$item',`unitRate`='$rate' WHERE `pid`='$id'";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        //echo "<script>alert('Service Updated Successfully');</script>";
        echo '<script> window.location="pricing.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location="pricing.php"; </script>';
    }      

  
}
?>



<?php
// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql1 = "DELETE FROM `products` WHERE `pid`='$id'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    //echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="pricing.php";</script>';
}

?>

