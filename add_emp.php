<?php include("connect.php"); ?>

<?php 

if (isset($_POST['submit'])) 
{
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gen = $_POST['gen'];
    $date = $_POST['date'];
    $adds = $_POST['adds'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $des = $_POST['des'];
    $full=$fname." ".$mname." ".$lname; 
    $user = $_POST['shopk'];
    $pass = $_POST['pass'];
    //$date = $_POST['date'];
    

    $image = $_FILES['upl'];
    $profile = upload_Profile($image,"assets/image/");
    $image = $_FILES['upl1'];
    $doc = upload_Profile($image,"assets/image/");
    $image = $_FILES['upl2'];
    $doc1 = upload_Profile($image,"assets/image/");
    $status="";
    if($des=='Delevery Boy')
    {
        $status="inactive";
    }


    if($des=='Other Staff')
    {
        $query="INSERT INTO `staff`(`id`, `fname`, `mname`, `lname`, `gen`,`adds`, `city`, `state`, `pin`, `mobile`,`email`, `bid`, `des`,`upl`,`upl1`,`upl2`,`full`,`date`) VALUES ('$id','$fname','$mname','$lname','$gen','$adds','$city','$state','$pin','$mobile','$email','$branch','$des','$profile','$doc','$doc1','$full','$date')";
        $confirm = mysqli_query($conn,$query);
        if($confirm)
        {
    
            echo "<script>alert('Staff Register succsessful');</script>";
            echo '<script> window.location= "add_employee.php"; </script>';

        }
        else
        {
                echo "<script>alert('unsuccsessful');</script>";              
        }
    }
    else
    {
        $query="INSERT INTO `staff`(`id`, `fname`, `mname`, `lname`, `gen`,`adds`, `city`, `state`, `pin`, `mobile`,`email`, `bid`, `des`,`upl`,`upl1`,`upl2`,`full`,`date`,`status`) VALUES ('$id','$fname','$mname','$lname','$gen','$adds','$city','$state','$pin','$mobile','$email','$branch','$des','$profile','$doc','$doc1','$full','$date','$status')";
           $confirm = mysqli_query($conn,$query);
           if($confirm)
           {
                $query="INSERT INTO `login`(`id`,`username`, `password`, `user`) VALUES ('$id','$user','$pass','$des')";
                $confirm = mysqli_query($conn,$query) or die(mysqli_error());
                if($confirm)
                {
                    
                        echo "<script>alert('Staff Register succsessful');</script>";
                     echo '<script> window.location= "add_employee.php"; </script>';
                }
           }
           else
           {
                  echo "<script>alert('unsuccsessful');</script>";              
           }
        
    }
        
}


if (isset($_POST['update'])) 
{
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gen = $_POST['gen'];
    
    $adds = $_POST['adds'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $des = $_POST['des'];
    $full=$fname." ".$mname." ".$lname; 
    //$date = $_POST['date'];
    

    $image = $_FILES['upl'];
    $profile = upload_Profile($image,"assets/image/");
    $image = $_FILES['upl1'];
    $doc = upload_Profile($image,"assets/image/");
    $image = $_FILES['upl2'];
    $doc1 = upload_Profile($image,"assets/image/");
    
    $query = "UPDATE `staff` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`gen`='$gen',`adds`='$adds',`city`='$city',`state`='$state',`pin`='$pin',`mobile`='$mobile',`email`='$email',`bid`='$branch',`des`='$des' WHERE `id`='$id'";
    if($profile!='')
    {
        $query="UPDATE `staff` SET `upl`='$profile' WHERE `id`='$id'";  
    }
    if($doc!='')
    {
        $query="UPDATE `staff` SET `upl1`='$doc' WHERE `id`='$id'";  
    }
    if($doc1!='')
    {
        $query="UPDATE `staff` SET `upl2`='$doc1' WHERE `id`='$id'";  
    }
    $confirm = mysqli_query($conn, $query) or die(mysqli_error());
    if($confirm) {
        echo "<script>alert('staff Detail updated');</script>";
        echo "<script>location='view_employee.php';</script>";
    }
}





// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql1 = "DELETE FROM `login` WHERE id='$id'";
    $confir = mysqli_query($conn,$sql1) or die(mysqli_error());
    if($confir)
    {
        $sql1 = "DELETE FROM `staff` WHERE id='$id'";
        if (!mysqli_query($conn, $sql1)) {
            die('Error: ' . mysqli_error($conn ));
        }
        //echo '<script>alert("Record Deleted");</script>';
        echo '<script>location="view_employee.php";</script>';
    }
    else
    {
        $sql1 = "DELETE FROM `staff` WHERE id='$id'";
        if (!mysqli_query($conn, $sql1)) {
            die('Error: ' . mysqli_error($conn ));
        }
        //echo '<script>alert("Record Deleted");</script>';
        echo '<script>location="view_employee.php";</script>';
    }
}







?>

<?php

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
