<?php include("sidebar.php");

$update='true'; $dis=""; $title=""; $kg="";

?>

<link href="assets/css/foms.css" rel="stylesheet">

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">Service</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>
                <?php
                    $sid = 0;
                    $sql = "SELECT max(sid) FROM services";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $sid=$row['max(sid)'];
                        $sid++;
                    }
                ?>

                <?php
                    if(isset($_GET['edit']))
                    { 
                        $sid=$_GET['edit'];
                        $qry="SELECT * FROM `services` WHERE `sid`='$sid'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $sid=$row['sid'];
                            $title=$row['title'];
                            $dis =$row['dis'];
                            $kg =$row['price'];
                            $update="false";

                            
                        }

                    }
                ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <!--<form action="service_submit.php" method="post" enctype="multipart/form-data">
            
            <div class="row mt-2">
               
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">service Id</label>
                    <input type="text" class="form-control form-control-sm" value="<?php echo $sid; ?>" name="sid" id="sid" placeholder="" readonly>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Title </label>
                    <input type="text" name="title" id="title" class="form-control form-control-sm" value="<?php echo $title; ?>" placeholder="Add Title" required>
                </div>    

                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Description </label>
                    <input type="text" name="dis" id="dis" class="form-control form-control-sm" value="<?php echo $dis; ?>" placeholder="Add Description" required>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Price/KG</label>
                    <input type="text" name="kg" id="kg" class="form-control form-control-sm" value="<?php echo $kg; ?>" placeholder="Add Description" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-2">
                    <?php
                        if($update=='true')
                        {
                            ?>
                            <button type="submit" name="postSubmit" class="btn btn-sm btn-primary col-md-12">Submit</button>
                            <?php
                        }else
                        {
                            ?>
                                <button type="submit" name="postUpdate" class="btn btn-sm btn-danger col-md-12">Update</button>
                </div>
                <div class="group-form col-md-2">
                    <a href="service.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                            <?php
                        }
                    ?>   
                </div>
            </div>
        </form>-->
        <hr />
        </div>
        <div class="table-responsive" style="overflow-y:scroll; height: 580px; width:80% margin-left: 100px;">
            <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price/kg</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    $qry="select * from services";
                    $exc=mysqli_query($conn,$qry);
                    while($row=mysqli_fetch_array($exc)){
            
                    ?>
                    <tr class="text-center">
                        <td><?php echo $row['sid'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['dis'] ?></td>
                        <td><?php echo $row['kgRate'] ?></td>
                    <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                    </tr>
                    <?php
                    }
                ?>    
            </tbody>
            </table>
        </div>
    
</main>



<?php include("../footer.php"); ?>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
