<?php include("sidebar.php");

 $update="true"; $bid=""; $bname=""; $pin=""; $adds=""; $gst=""; $mob=""; $email="";
?>


<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
            <h2 class="" style=" font-weight: 600">Branch</h2>
        </div>
        <hr style="margin: 0px;">      
    </div>
</div>
               <?php
                   /*  $bid = 0;
                    $sql = "SELECT max(bid) FROM branch";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $bid=$row['max(bid)'];
                        $bid++;
                    }
                ?>


                         
                <?php
                    if(isset($_GET['edit']))
                    { 
                        $bid=$_GET['edit'];
                        $qry="SELECT * FROM branch WHERE bid='$bid'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $bid=$row['bid'];
                            $bname=$row['bname'];
                            $adds =$row['adds'];
                            $pin =$row['pin'];
                            $gst =$row['gst'];
                            $mob =$row['mobile'];
                            $email =$row['email'];
                            $update="false";

                            
                        }

                    }
                */?> 
<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <!--<form action="branch_submit.php" method="post" id="form1" enctype="multipart/form-data">
            
            <div class="row mt-4">
               
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Branch Id</label>
                    <input type="text" class="form-control form-control-sm" value="<?php echo $bid; ?>" name="bid" id="bid" placeholder="" readonly>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Branch Name</label>
                    <input type="text" name="bname" class="form-control form-control-sm" value="<?php echo $bname; ?>" placeholder="Add Branch" required>

                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Address</label>
                    <input type="text" name="adds" class="form-control form-control-sm" value="<?php echo $adds; ?>" placeholder="Add A Main Address" required>

                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Pin Code</label>
                    <input type="text" name="zipcode" class="form-control form-control-sm" value="<?php echo $pin; ?>" placeholder="Add A Pin Code" required>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">GST No</label>
                    <input type="text" name="gst" class="form-control form-control-sm" value="<?php echo $gst; ?>" placeholder="Add A Gst No" required>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Mobile</label>
                    <input type="text" name="mobile" class="form-control form-control-sm" value="<?php echo $mob; ?>" placeholder="Add A Mobile No" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="Email" name="email" class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder="Add A Email" required>
                </div>
                <div class="group-form col-md-2">
                <?php
                    if($update=='true') 
                    { ?>
                        <label class="form_label" for="company_name"></label>
                        <button type="submit" name="postSubmit" class="btn btn-sm btn-primary col-md-12">Submit</button>
                    <?php
                    }else
                    {?>
                        <label class="form_label" for="company_name"></label>
                        <button type="submit" name="postUpdate" class="btn btn-sm btn-danger col-md-12">Update</button>
                </div>
                <div class="group-form col-md-2" style="margin-top:20px;">
                        <a href="branch.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                    <?php
                    }
                ?>
                </div>
                </br>
            </div>
        </form> 
        <hr />-->
    
        
            <div class="table-responsive" style="overflow-y:scroll; height: 580px; width:80% margin-left: 100px;">
            <table id="example" class="cell-border" style="width:100%">
                <thead>
                    <tr>
                        <th class="ss">S.no</th>
                        <th>Branch</th>
                        <th>Address</th>
                        <th>Zip Code</th>
                        <th>GSTN</th>
                        <th>Mobile</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>   
                    <?php 
                        
                        $qry="select * from branch";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc)){
                
                        ?>
                        <tr class="text-center">
                            <td><?php echo $row['bid'] ?></td>
                            <td><?php echo $row['bname'] ?></td>
                            <td><?php echo $row['adds'] ?></td>
                            <td><?php echo $row['pin'] ?></td>
                            <td><?php echo $row['gst'] ?></td>
                            <td><?php echo $row['mobile'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                        <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                        </tr>
                        <?php
                        }
                    ?>    
                </tbody>
                </table>
            </div>
    </div>
    
</main>



<?php include("../footer.php"); ?>


<script>
  function del(bid){
    if(confirm("Are you sure?")==true){
      location = "branch_submit.php?del="+bid;
    }else {

    }
  }
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
