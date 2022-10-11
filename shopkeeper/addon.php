<?php include("sidebar.php");

$update='true'; $dis=""; $addon=""; $rate="";

?>

<link href="assets/css/foms.css" rel="stylesheet">

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">Addon & Price</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>

                <?php
                    $id = 0;
                    $sql = "SELECT max(id) FROM addon";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $id=$row['max(id)'];
                        $id++;
                    }
                ?>

                <?php
                    if(isset($_GET['edit']))
                    { 
                        $id=$_GET['edit'];
                        $qry="SELECT * FROM `addon` WHERE `id`='$id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['id'];
                            $addon=$row['addon'];
                            $rate =$row['rate'];
                            $update="false";

                            
                        }

                    }
                ?>

<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <!--<form action="addon_submit.php" method="post" enctype="multipart/form-data">
            
            <div class="row mt-2">
               
                <div class="group-form col-md-2">
                    <label class="form_label" for="company_name">Id</label>
                    <input type="text" class="form-control form-control-sm" value="<?php echo $id; ?>" name="id" id="id" placeholder="" readonly>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Addon Name</label>
                    <input type="text" name="addon" id="addon" class="form-control form-control-sm" value="<?php echo $addon; ?>" placeholder="Addon Name" required>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Price</label>
                    <input type="text" name="rate" id="rate" class="form-control form-control-sm" value="<?php echo $rate; ?>" placeholder="Price" required>
                </div>
                <div class="group-form col-md-2">
                    <?php
                        if($update=='true')
                        {
                            ?>
                            <label class="form_label"></label>
                            <button type="submit" name="postSubmit" class="btn btn-sm btn-primary col-md-12">Submit</button>
                            <?php
                        }else
                        {
                            ?>
                                <label class="form_label"></label>
                                <button type="submit" name="postUpdate" class="btn btn-sm btn-danger col-md-12">Update</button>
                </div>
                <div class="group-form col-md-2">
                    <label class="form_label"></label>
                    <a href="addon.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                            <?php
                        }
                    ?>   
                </div>
            </div>
        </form>-->
        <hr />
        
        <div class="table-responsive" style="overflow-y:scroll; height: 580px; width:80% margin-left: 100px;">
            <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Addon Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    $qry="select * from addon";
                    $exc=mysqli_query($conn,$qry);
                    while($row=mysqli_fetch_array($exc)){
            
                    ?>
                    <tr class="text-center">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['addon'] ?></td>
                        <td><?php echo $row['rate'] ?></td>
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
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
