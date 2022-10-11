

<?php
include("connect.php");


if(isset($_POST['postSubmit']))
{
    $bid=$_POST['bid'];
    $bname=$_POST['bname'];
    $adds=$_POST['adds'];
    $pin=$_POST['zipcode'];
    $gst=$_POST['gst'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $query="INSERT INTO `branch`(`bid`,`bname`,`adds`,`pin`,`gst`,`mobile`,`email`)VALUES('$bid','$bname','$adds','$pin','$gst','$mobile','$email');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        echo "<script>alert('Branch Added Successfully');</script>";
        echo '<script> window.location= "branch.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location= "branch.php"; </script>';
    }      

  
}





if(isset($_POST['postUpdate']))
{
    $bid=$_POST['bid'];
    $bname=$_POST['bname'];
    $adds=$_POST['adds'];
    $pin=$_POST['zipcode'];
    $gst=$_POST['gst'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $query="UPDATE `branch` SET `bid`='$bid',`bname`='$bname',`adds`='$adds',`pin`='$pin',`gst`='$gst',`mobile`='$mobile',`email`='$email' WHERE `bid`='$bid'";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        echo "<script>alert('Branch Updated Successfully');</script>";
        echo '<script> window.location= "branch.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location= "branch.php"; </script>';
    }      

  
}
?>



<?php
// DELETE
if(isset($_GET['del'])){
    $bid = $_GET['del'];
    $sql1 = "DELETE FROM branch WHERE bid='$bid'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    //echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="branch.php";</script>';
}

?>

