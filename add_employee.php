<?php include("sidebar.php");
include('connect.php');
$update="true";
$fname="";
$mname ="";
$lname ="";
$gen ="";
$mob ="";
$email ="";
$adds ="";
$city ="";
$state ="";
$pin ="";
$des ="";
 ?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.form_label {
    font-weight: 400;
}
#myImg{
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  
}
#myImg:hover {opacity: 0.7;}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  height:100%;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
        <?php
            $query ="SELECT * FROM `staff` order by id desc";
            $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            $out=mysqli_fetch_array($confirm);
            $id=$out['id'] + 1;
            
            $username="vff".$id; $password="vff".rand(10000,100000);
        ?>
        <?php
                    if(isset($_GET['edit']))
                    { 
                        // $id=$_GET['edit'];
                        // $qry="SELECT * FROM staff WHERE id='$id'";
                        // $exc=mysqli_query($conn,$qry);
                        // while($row=mysqli_fetch_array($exc))
                        $qry="SELECT `staff`.*,`branch`.`bid`,`branch`.`bname` FROM `staff`,`branch` WHERE `staff`.`id`='$id' AND `staff`.`bid`=`branch`.`bid`";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['id'];
                            $fname=$row['fname'];
                            $mname =$row['mname'];
                            $lname =$row['lname'];
                            $gen =$row['gen'];
                            $mob =$row['mobile'];
                            $email =$row['email'];
                            $adds =$row['adds'];
                            $city =$row['city'];
                            $state =$row['state'];
                            $pin =$row['pin'];
                            $des =$row['des'];
                            $branch =$row['branch'];
                            $update="false";

                            
                        }

                    }
        ?>
        <?php
                    if(isset($_GET['edit1']))
                    { 
                        $id=$_GET['edit1'];
                        $qry="SELECT `staff`.*,`branch`.`bid`,`branch`.`bname` FROM `staff`,`branch` WHERE `staff`.`id`='$id' AND `staff`.`bid`=`branch`.`bid`";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['id'];
                            $id=$row['id'];
                            $fname=$row['fname'];
                            $mname =$row['mname'];
                            $lname =$row['lname'];
                            $gen =$row['gen'];
                            $mob =$row['mobile'];
                            $email =$row['email'];
                            $adds =$row['adds'];
                            $city =$row['city'];
                            $state =$row['state'];
                            $pin =$row['pin'];
                            $des =$row['des'];
                            $bid =$row['bid'];
                            $branch =$row['bname'];
                            $path =$row['upl'];
                            $update="view";

                            
                        }

                    }
        ?>
<?php
if($update=='view') 
{ ?>
        <div class="page-content container-fluid">
            <div class="footer">
                <div class="d-flex justify-content-center">
                    <h2 class="" style=" font-weight: 600">View Employee Details</h2>
                </div>
                <hr style="margin: 0px;">
            
            </div>
        </div>
    <?php
}
else
{
    if($update=='true') 
    { ?>

        <div class="page-content container-fluid">
            <div class="footer">
                <div class="d-flex justify-content-center">
                    <h2 class="" style=" font-weight: 600">Employee Registration</h2>
                </div>
                <hr style="margin: 0px;">
            
            </div>
        </div>
    <?php
    }else
    {
        ?>
        <div class="page-content container-fluid">
            <div class="footer">
                <div class="d-flex justify-content-center">
                    <h2 class="" style=" font-weight: 600">Employee Details Edit And Update</h2>
                </div>
                <hr style="margin: 0px;">
            
            </div>
        </div>
        <?php
    }

}
?>

<main class="page-content">
    <div class="container">
        <form action="add_emp.php" method="post" enctype="multipart/form-data">
            <center><h4>Personal Information</h4></center><hr></br>
            <?php
                if($update=='view')
                {
                    ?>
                            <div class="row mt-2">
                                <div class="group-form col-md-4">
                                    <label class="form_label" for="company_name">Profile</label>
                                    <img src="<?php echo $path; ?>" id='myImg' height="70" width="70">
                                </div>
                                <div class="group-form col-md-2">
                                    <label class="form_label" for="company_name"></label>
                                    <a href="staff_print.php?view=<?php echo $id; ?>" type="button" style="margin-left:600px;" class="btn btn-sm btn-danger col-md-12">Download</a> 
                                </div></br>
                            </div>
                    <?php
                }
            ?>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Employee Id</label>
                    
                    <input type="text" readonly value="<?php echo $id; ?>" class="form-control form-control-sm" name="id" id="id" placeholder="Employee Id">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">First Name</label>
                    <input type="text" class="form-control form-control-sm" required name="fname" id="fname" value="<?php echo $fname; ?>" placeholder="First Name"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Middle Name</label>
                    <input type="text" class="form-control form-control-sm" required name="mname" id="mname" value="<?php echo $mname; ?>" placeholder="Middle Name"/>
                </div></br>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Last Name</label>
                    <input type="text" class="form-control form-control-sm" required name="lname" id="lname" value="<?php echo $lname; ?>" placeholder="Last Name"/>
                </div>
                <?php
                if($update=='true') 
                { ?>
                    <div class="group-form col-md-4">

                    
                        <label class="form_label" for="company_name">Gender</label>
                    
                        <select class="form-control form-control-sm" required name="gen" id="gen">
                            <option>Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        <select>
                    </div>
                <?php
                }
                else{
                    ?>
                    <div class="group-form col-md-4">

                    
                        <label class="form_label" for="company_name">Gender</label>
                    
                        <select class="form-control form-control-sm" required name="gen" id="gen">
                            <option><?php echo $gen; ?></option>
                            <option>Male</option>
                            <option>Female</option>
                        <select>
                    </div>
                    <?php
                }
                ?>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Upload Profile</label>
                    <input type="file" class="form-control form-control-sm" name="upl" id="upl" accept="image/x-png,image/jpg,image/jpeg" />
                </div></br>
            </div></br>
            <center><h4>Contact Information</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Address</label>
                    <input type="text" class="form-control form-control-sm" name="adds" value="<?php echo $adds; ?>" id="adds" placeholder="Add Address">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">City</label>
                    <input type="text" required class="form-control form-control-sm" name="city" id="city" value="<?php echo $city; ?>" placeholder="Add City">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">State</label>
                    <input type="text" class="form-control form-control-sm" required name="state" id="state" value="<?php echo $state; ?>" placeholder="Add State"/>
                </div>
            </div>   
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Zip Code</label>
                    <input type="text" class="form-control form-control-sm" required name="pin" value="<?php echo $pin; ?>" id="pin" placeholder="Pin Code"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Mobile Number</label>
                    <input type="text" required class="form-control form-control-sm" name="mobile" id="mobile" value="<?php echo $mob; ?>" placeholder="Add Mobile">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="email" class="form-control form-control-sm" required name="email" id="email" value="<?php echo $email; ?>" placeholder="Add Email"/>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Upload Document</label>
                    <input type="file" class="form-control form-control-sm" name="upl1" id="upl1" accept="image/x-png,image/jpg,image/jpeg" />
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Upload Document2</label>
                    <input type="file" class="form-control form-control-sm" name="upl2" id="upl2" accept="image/x-png,image/jpg,image/jpeg" />
                </div>
                <div class="group-form col-md-4">
                    <input type="hidden" class="form-control form-control-sm" required name="date" id="date" placeholder="Add date"/>
                    <script>
                        $(document).ready( function() {
                          var yourDateValue = new Date();
                          var formattedDate = yourDateValue.toISOString().substr(0, 10)
                        $('#date').val(formattedDate);
                        });
                    </script>
                </div>
            </div></br>
            
            <center><h4>Login Information</h4></center><hr></br>
            <div class="row mt-2">
            <?php
                if($update=='true') 
                { ?>
                    <div class="group-form col-md-4">
                        <label class="form_label" for="company_name">Branch</label>
                        <select class="form-controls form-control-sm" required name="branch" id="branch">
                            <option value="">Select Branch</option> 
                            <?php
                                $query="SELECT `bid`,`bname` FROM `branch` ORDER BY `bid` ASC";
                                $exc=mysqli_query($conn,$query);
                                while($res=mysqli_fetch_array($exc))
                                {
                                    ?>
                                        <option value="<?php echo $res['bid']; ?>"><?php echo $res['bname']; ?></option>
                                    <?php
                                } 
                            ?>
                            
                                
                        </select>
                    </div>
                    <?php
                }else
                {
                    ?>
                        <div class="group-form col-md-4">
                            <label class="form_label" for="company_name">Branch</label>
                            <select class="form-controls form-control-sm" required name="branch" id="branch">
                                <option value="<?php echo $bid; ?>"><?php echo $branch; ?></option> 
                                <?php
                                    $query="SELECT `bid`,`bname` FROM `branch` ORDER BY `bid` ASC";
                                    $exc=mysqli_query($conn,$query);
                                    while($res=mysqli_fetch_array($exc))
                                    {
                                        ?>
                                            <option value="<?php echo $res['bid']; ?>"><?php echo $res['bname']; ?></option>
                                        <?php
                                    } 
                                ?>
                                
                                    
                            </select>
                        </div>
                    <?php
                }
                
                if($update=='true') 
                { ?>           
                    <div class="group-form col-md-4">
                        <label class="form_label" for="company_name">Designation</label>        
                        <select class="form-controls form-control-sm" required name="des" id="des" onchange="user1()">
                            <option value="">Select Designation</option>
                            <option>Shop Keeper</option>
                            <option>Delevery Boy</option>
                            <option>Other Staff</option>
                        </select>
                    </div>
                <?php
                }else
                {
                    ?>

                    <div class="group-form col-md-4">
                        <label class="form_label" for="company_name">Designation</label>
                        <input type="text" readonly class="form-control form-control-sm" value="<?php echo $des; ?>" name="des" id="des" placeholder="des">
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
                if($update=='true') 
                { ?>
                    <div id="hides">
                        <div class="row mt-2">
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">Username</label>
                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $username; ?>" name="shopk" id="shopk" placeholder="username">
                            </div>
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">Password</label>
                                <input type="text" readonly class="form-control form-control-sm" name="pass" value="<?php echo $password; ?>" id="pass" placeholder="password">
                            </div>
                        </div>
                    </div>
                <?php
                }else
                {
                    echo "";
                }
            ?>
            <div class="row mt-2">
                <div class="group-form col-md-2">
                <?php
                    if($update=='view')
                    {
                        ?>
                                <a href="view_employee.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                        <?php
                    }else
                    {
                        if($update=='true') 
                        { ?>
                            <label class="form_label" for="company_name"></label>
                            <button type="submit" name="submit" class="btn btn-sm btn-success col-md-12">Submit</button>
                        <?php
                        }else
                        {?>
                            <label class="form_label" for="company_name"></label>
                            <button type="submit" name="update" class="btn btn-sm btn-danger col-md-12">Update</button>
                    </div>
                    <div class="group-form col-md-2" style="margin-top:20px;">
                            <a href="view_employee.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                        <?php
                        }
                    }
                        
                ?>
                </div>
            </div>
            
        </form>
    </br>
    </br>
    </br>
</div>
</main>

<?php
if($update=='true') 
{ ?>
    <script>
        document.getElementById("hides").style.display= "none";
        function user1()
        {
            //alert("hii");
            var wingname = document.getElementById('des').value;
            if(wingname=='Other Staff')
            {
                document.getElementById("hides").style.display= "none";
                
            }
            else
            {
                document.getElementById("hides").style.display= "";
            }
            return;
        }
    </script>
<?php
}
?>

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<!-- page-content" -->
