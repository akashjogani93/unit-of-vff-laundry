
<?php
include("connect.php");


if(isset($_POST['postSubmit']))
{
    $id=$_POST['id'];
    //$ser=$_POST['service'];
    //$cate=$_POST['cate'];
    $item=$_POST['item'];
    //$unit=$_POST['unit'];
    //$kg=$_POST['kg'];
    //$image = $_FILES['img'];
    //echo $img = upload_Profile($image,"assets/image/");
    //$query="SELECT `sid` FROM `services` WHERE `title`='$ser' ";
    //$confirm=mysqli_query($conn,$query);
    //while($row=mysqli_fetch_array($confirm))
    //{
        //$sid=$row['sid'];
        $query="INSERT INTO `item`(`id`,`iname`)VALUES('$id','$item');";
        $confirm = mysqli_query($conn,$query) or die(mysqli_error());
        if($confirm)
        {
            //echo "<script>alert('Item Added Successfully');</script>";
            echo '<script> window.location= "items.php"; </script>';

        }
        else{
            echo "<script>alert('unsuccessful');
            </script>";         
            echo '<script> window.location= "items.php"; </script>';
        }

    //}
          

  
}


if(isset($_POST['postUpdate']))
{
    $id=$_POST['id'];
    //$ser=$_POST['service'];
    //$cate=$_POST['cate'];
    $item=$_POST['item'];
    //$unit=$_POST['unit'];
    //$kg=$_POST['kg'];
    //$image = $_FILES['img'];
    //echo $img = upload_Profile($image,"assets/image/");
        //$sid=$row['sid'];
        $query="UPDATE `item` SET `id`='$id',`iname`='$item' WHERE `id`='$id'";
        $confirm = mysqli_query($conn,$query) or die(mysqli_error());
        if($confirm)
        {
            echo "<script>alert('Item Updated Successfully');</script>";
            echo '<script> window.location= "items.php"; </script>';

        }
        else{
            echo "<script>alert('unsuccessful');
            </script>";         
            echo '<script> window.location= "items.php"; </script>';
        }
          
}



//upload images profele & other document in jpg,png format
function upload_Profile($image, $target_dir)
{   
    if($image['name']!=""){
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $msg = " ";
    try {
        $check = getimagesize($image["tmp_name"]);
        $msg = array();
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $msg[1] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $msg[2] = "Sorry, only PDF, JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg[3] = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                //$msg= "The file ". basename( $image["name"]). " has been uploaded.";
            } else {
                $msg[4] = "Sorry, there was an error uploading your file.";
            }
        }
        echo "<pre>";
        print_r($msg);
        return ltrim($target_file, '');
        } catch (Exception $e) {
        echo "Message" . $e->getmessage();
    }
}else{
    return "";
}
}

?>







<?php
// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql1 = "DELETE FROM item WHERE id='$id'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    //echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="items.php";</script>';
}

?>

