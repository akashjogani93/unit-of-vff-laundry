<?php include("sidebar.php"); 
    $type=$_SESSION["type"];
    $id=$_SESSION["id"];
    //echo $id;
    //echo $type;
?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
      <h2 class="" style=" font-weight: 600">Change Password</h2>
        </div>
        <hr style="margin: 0px;">
                <link rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    </div>
</div>
<style>
form i {
    margin-left: -30px;
    cursor: pointer;
}
</style>
 <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <div class="mt-3 col-md-10 col-12">
             <form action="" method="post" enctype="multipart/form-data">  
          	 <div class="table-responsive">
          	 	  <table class="table table-bordered">
                    <thead>
                    	<tr>
	                    	<th>Enter Old Password:</th>
                        <td><input type="text" name="old" class="form-control form-control-sm" required>
                    	</tr>
                    	<tr>
                    		<th>Create New password:</th>
                    		<td><input type="text" name="createpass" id="files" class="form-control form-control-sm"  required /></td>
                    	</tr>
                    	<tr>
                    		<th>Confirm New Password</th>
                    		<td><input type="text" class="form-control form-control-sm" name="confirmpass" required title="Select Html File"></td>
                    	</tr>
                          
                    		<tr>
                    			<td></td>
                    			<td>
                    				<button type="submit" name="New_pass" class="btn btn-sm btn-success col-md-3">Submit</button>
                    				<button type="reset" class="btn btn-sm btn-danger col-md-3">Reset</button>
                    			</td>
                    		</tr>
                    	</thead>
                    	</table>
                    </div>
                    </form>
                </div>
     

    </div>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

    

  </main>

  
  <?php
 //update Password
if(isset($_POST['New_pass']))
{
    //echo "<script>alert(".$id.");</script>";
    //$id=$_SESSION["id"];
    //$type=$_SESSION["type"];
    $password=$_POST['old'];
    //$id=$_POST['id'];
	$create_pass=$_POST['createpass'];
	$confirm_pass=$_POST['confirmpass'];

	if($create_pass==$confirm_pass)
	{
		$query="SELECT `password` FROM `login` WHERE `user`='$type' AND `id`='$id'";
		$confirm=mysqli_query($conn,$query) or die(mysqli_error());
        $row=mysqli_fetch_array($confirm);
        $ps=$row['password'];
        //echo "<script>alert(".$ps.");</script>";
		if($ps==$password)
		{
            //echo "<script>alert(".$id.");</script>";
			$query="UPDATE `login` SET `password`='$confirm_pass' WHERE `user`='$type' AND `id`='$id'";
			$confirm=mysqli_query($conn,$query) or die(mysqli_error());
			if($confirm)
			{
			    echo "<script>alert('Password Updated');</script>";
				echo "<script>location='dashboard.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Wrong');</script>";
			
		}
	}else{
		echo "<script>alert('Password Wrong, Try Again');</script>";
		echo "<script>location='pass.php';</script>";
	}
	
}


?>



<!-- page-content" -->
<?php include("../footer.php"); ?>
</div>
</body>

</html>