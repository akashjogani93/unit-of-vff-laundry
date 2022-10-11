
<?php
include("connect.php");


if(isset($_POST['postSubmit']))
{
    $id=$_POST['id'];
    $addon=$_POST['addon'];
    $rate=$_POST['rate'];
    $query="INSERT INTO `addon`(`id`,`addon`,`rate`)VALUES('$id','$addon','$rate');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        //echo "<script>alert('Service Added Successfully');</script>";
        echo '<script> window.location= "addon.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location="addon.php"; </script>';
    }      

  
}



if(isset($_POST['postUpdate']))
{
    $id=$_POST['id'];
    $addon=$_POST['addon'];
    $rate=$_POST['rate'];
    $query="UPDATE `addon` SET `id`='$id',`addon`='$addon',`rate`='$rate' WHERE `id`='$id'";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        //echo "<script>alert('Service Updated Successfully');</script>";
        echo '<script> window.location= "addon.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location= "addon.php"; </script>';
    }      

  
}
?>



<?php
// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql1 = "DELETE FROM `addon` WHERE `id`='$id'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    //echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="addon.php";</script>';
}

?>

