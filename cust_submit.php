
<?php
include("connect.php");


if(isset($_POST['addcust']))
{
    $id=$_POST['id'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $hno=$_POST['hno'];
    $adds=$_POST['adds'];
    $city=$_POST['city'];
    $land=$_POST['land'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $gstn=$_POST['gstn'];
    $adds1=$_POST['adds1'];
    $full=$_POST['full'];
    $query="INSERT INTO `customer`(`cid`,`email`,`mobile`,`hno`,`adds`,`land`,`city`,`state`,`zip`,`full`,`gstn`,`adds1`)VALUES('$id','$email','$mobile','$hno','$adds','$land','$city','$state','$zip','$full','$gstn','$adds1');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        echo "<script>alert('Customer Added Successfully');</script>";
        echo '<script> window.location="add_cust.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location="add_cust.php"; </script>';
    }      

  
}


if(isset($_POST['postUpdate']))
{
    $id=$_POST['id'];
    $full=$_POST['full'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $hno=$_POST['hno'];
    $adds=$_POST['adds'];
    $city=$_POST['city'];
    $land=$_POST['land'];
    $state=$_POST['state'];
    $adds1=$_POST['adds1'];
    $gstn=$_POST['gstn'];
    $zip=$_POST['zip'];
   
    $query="UPDATE `customer` SET `cid`='$id',`email`='$email',`mobile`='$mobile',`hno`='$hno',`adds`='$adds',`city`='$city',`state`='$state',`zip`='$zip',`full`='$full',`gstn`='$gstn',`adds1`='$adds1' WHERE `cid`='$id'";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        //echo "<script>alert('Service Updated Successfully');</script>";
        echo '<script> window.location="cust_view.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location="cust_view.php"; </script>';
    }      

  
}
?>



<?php
// DELETE
if(isset($_GET['del'])){
    $bid = $_GET['del'];
    $sql1 = "DELETE FROM customer WHERE cid='$bid'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    //echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="cust_view.php";</script>';
}

?>
