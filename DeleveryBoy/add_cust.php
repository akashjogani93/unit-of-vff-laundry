<?php include("sidebar.php"); $update='true'; $full=""; 
$email=""; $mobile=""; $hno="";  $adds=""; $land=""; $city=""; $state=""; $zip=""; $gstn=""; $adds1=""; ?>

                <?php
                    $id = 0; 
                    $sql = "SELECT max(cid) FROM customer";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $id=$row['max(cid)'];
                        $id++;
                    }
                ?>

                <?php
                    if(isset($_GET['edit']))
                    { 
                        $id=$_GET['edit'];
                        $qry="SELECT * FROM `customer` WHERE `cid`='$id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['cid'];
                            $full=$row['full'];
                            $email =$row['email'];
                            $mobile =$row['mobile'];
                            $hno =$row['hno'];
                            $adds =$row['adds'];
                            $land =$row['land'];
                            $city =$row['city'];
                            $state =$row['state'];
                            $zip =$row['zip'];
                            $gstn =$row['gstn'];
                            $adds1 =$row['adds1'];
                            $update="false";

                            
                        }

                    }
                ?>
                <?php
                    if(isset($_GET['edit1']))
                    { 
                        $id=$_GET['edit1'];
                        $qry="SELECT * FROM `customer` WHERE `cid`='$id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['cid'];
                            $full=$row['full'];
                            $email =$row['email'];
                            $mobile =$row['mobile'];
                            $hno =$row['hno'];
                            $adds =$row['adds'];
                            $land =$row['land'];
                            $city =$row['city'];
                            $state =$row['state'];
                            $zip =$row['zip'];
                            $gstn =$row['gstn'];
                            $adds1 =$row['adds1'];
                            $update="view";

                            
                        }

                    }
                ?>


<div class="page-content container-fluid">
    <div class="footer">
        <?php if($update=="view")
        {
            
            ?>
                <div class="d-flex justify-content-center">
                    <h2 class="" style=" font-weight: 600">View Customer Details</h2>
                </div>
            <?php
        }
        else
        {
            if($update=="true")
            {
                ?>
                        <div class="d-flex justify-content-center">
                            <h2 class="" style=" font-weight: 600">Customer Registration</h2>
                        </div>
                <?php
            }else
            {
                ?>
                        <div class="d-flex justify-content-center">
                            <h2 class="" style=" font-weight: 600">Edit Customer Details</h2>
                        </div>
                <?php
            }
        }
        ?>
        <hr style="margin: 0px;">
    </div>
</div>




<main class="page-content">
    <div class="container">
        <form action="cust_submit.php" method="post" enctype="multipart/form-data">
            <center><h4>Customer Information</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Cust Id</label>
                    
                    <input type="text" readonly  class="form-control form-control-sm" name="id" id="id" value="<?php echo $id; ?>" placeholder="Cust Id">
                </div>
                <div class="group-form col-md-6">
                    <label class="form_label" for="company_name">Full Name/Company Name</label>
                    <input type="text" class="form-control form-control-sm" required name="full" id="full" value="<?php echo $full; ?>" placeholder="First Name"/>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">GSTN</label>
                    <input type="text" class="form-control form-control-sm" name="gstn" id="gstn" value="<?php echo $gstn; ?>" placeholder="Add GSTN"/>
                </div>
            </div></br>
            <center><h4>Contact Information</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="text" class="form-control form-control-sm" required name="email" id="email" value="<?php echo $email; ?>" placeholder="Email"/>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Mobile</label>
                    <input type="text" class="form-control form-control-sm" required name="mobile" id="mobile" value="<?php echo $mobile; ?>" placeholder="Mobile"/>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">H.no</label>
                    <input type="text" class="form-control form-control-sm" name="hno" id="hno" value="<?php echo $hno; ?>" placeholder="House No">
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Landmark</label>
                    <input type="text" class="form-control form-control-sm" required name="land" id="land" value="<?php echo $land; ?>" placeholder="Add Landmark"/>
                </div>
            </div>   
            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Address</label>
                    <input type="text" required class="form-control form-control-sm" name="adds" id="adds" value="<?php echo $adds; ?>" placeholder="Add adds">
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">City</label>
                    <input type="text" class="form-control form-control-sm" required name="city" id="city" value="<?php echo $city; ?>" placeholder="Add City"/>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">State</label>
                    <input type="text" required class="form-control form-control-sm" name="state" id="state" value="<?php echo $state; ?>" placeholder="Add State">
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Zipcode</label>
                    <input type="text" class="form-control form-control-sm" required name="zip" id="zip" value="<?php echo $zip; ?>" placeholder="Zipcode"/>
                </div>
            </div></br>
            <center><h4>Dilevery Address</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-6">
                    <label class="form_label" for="company_name">Delevery Address</label>
                    <input type="text" class="form-control form-control-sm" name="adds1" id="adds1" value="<?php echo $adds1; ?>" placeholder="Add To Delevery Address">
                </div>
                <?php if($update=="view")
                        {
                            
                            ?>
                            <div class="group-form col-md-2">
                                <label class="form_label"></label>
                                <a href="cust_view.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div class="group-form col-md-2">
                                <?php
                                    if($update=='true')
                                    {
                                        ?>
                                        <label class="form_label"></label>
                                        <button type="submit" name="addcust" class="btn btn-sm btn-success col-md-12">Submit</button>
                                        <?php
                                    }else
                                    {
                                        ?>
                                            <label class="form_label"></label>
                                            <button type="submit" name="postUpdate" class="btn btn-sm btn-danger col-md-12">Update</button>
                            </div>
                            <div class="group-form col-md-2">
                                <label class="form_label"></label>
                                <a href="cust_view.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                                        <?php
                                    }
                                ?>   
                            </div>
                            <?php 
                        }
                        ?>
            </div><br><br><br>
        </form>
    </div>
</main>
<?php include("../footer.php"); ?>