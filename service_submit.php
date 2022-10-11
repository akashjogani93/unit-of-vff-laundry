

<?php
include("connect.php");


if(isset($_POST['postSubmit']))
{
    $sid=$_POST['sid'];
    $title=$_POST['title'];
    $dis=$_POST['dis'];
    $kg=$_POST['kg'];
    $query="INSERT INTO `services`(`sid`,`title`,`dis`,`kgRate`)VALUES('$sid','$title','$dis','$kg');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        echo "<script>alert('Service Added Successfully');</script>";
        echo '<script> window.location= "service.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location= "service.php"; </script>';
    }      

  
}





if(isset($_POST['postUpdate']))
{
    $sid=$_POST['sid'];
    $title=$_POST['title'];
    $dis=$_POST['dis'];
    $kg=$_POST['kg'];
    $query="UPDATE `services` SET `sid`='$sid',`title`='$title',`dis`='$dis',`kgRate`='$kg' WHERE `sid`='$sid'";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        echo "<script>alert('Service Updated Successfully');</script>";
        echo '<script> window.location= "service.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location= "service.php"; </script>';
    }      

  
}
?>



<?php
// DELETE
if(isset($_GET['del'])){
    $sid = $_GET['del'];
    $sql1 = "DELETE FROM `services` WHERE `sid`='$sid'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    //echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="service.php";</script>';
}

?>