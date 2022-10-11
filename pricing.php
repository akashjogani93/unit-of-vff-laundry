<?php include("sidebar.php");
include("connect.php");
$update='true'; $ser=""; $item=""; $rate="";

?>


<link href="assets/css/foms.css" rel="stylesheet">

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">Price Of There Item</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>



                <?php
                    $id = 0;
                    $sql = "SELECT max(pid) FROM products";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $id=$row['max(pid)'];
                        $id++;
                    }
                ?>

                <?php
                    if(isset($_GET['edit']))
                    { 
                        $id=$_GET['edit'];
                        $qry="SELECT * FROM `products` WHERE `pid`='$id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['pid'];
                            $ser=$row['services'];
                            $item =$row['productName'];
                            $rate =$row['unitRate'];
                            $update="false";

                            
                        }

                    }
                ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <form action="pricing_submit.php" method="post" enctype="multipart/form-data">
            
            <div class="row mt-2">
               
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Sl.no</label>
                    <input type="text" class="form-control form-control-sm" value="<?php echo $id; ?>" name="id" id="id" placeholder="" readonly>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Select Services</label>
                    <select class="form-controls form-control-sm" required name="service" id="service" onchange="service1()">
                        <?php
                        if($update=='true') 
                        { ?>
                            <option value="">Select Services</option> 
                                <?php
                                    $query="SELECT DISTINCT `title` FROM `services` ORDER BY `sid` ASC";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                {?>
                                    <option><?php echo $loca['title']; ?></option>
                                <?php   
                                }   
                        }else
                        {?>
                            <option><?php echo $ser; ?></option> 
                                <?php
                                    $query="SELECT DISTINCT `title` FROM `services` ORDER BY `sid` ASC";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                {?>
                                    <option><?php echo $loca['title']; ?></option>
                                <?php   }   
                                
                            
                        }
                    ?>   
                    </select>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Select Items</label>
                    <select class="form-controls form-control-sm" required name="item" id="item" onchange="service1()">
                        <?php
                        if($update=='true') 
                        { ?>
                            <option value="">Select Items</option> 
                                <?php
                                    $query="SELECT DISTINCT `iname` FROM `item` ORDER BY `id` ASC";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                {?>
                                    <option><?php echo $loca['iname']; ?></option>
                                <?php   
                                }   
                        }else
                        {?>
                            <option><?php echo $item; ?></option> 
                                <?php
                                    $query="SELECT DISTINCT `iname` FROM `item` ORDER BY `id` ASC";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                {?>
                                    <option><?php echo $loca['iname']; ?></option>
                                <?php   }   
                                
                            
                        }
                    ?>   
                    </select>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Price/Item</label>
                    <input type="text" name="rate" id="rate" class="form-control form-control-sm" value="<?php echo $rate; ?>" placeholder="Amount Of Item" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-2">
                    <?php
                        if($update=='true')
                        {
                            ?>
                            <label class="form_label"></label>
                            <button type="submit" name="postSubmit" class="btn btn-sm btn-success col-md-12">Add</button>
                            <?php
                        }else
                        {
                            ?>
                                <label class="form_label"></label>
                                <button type="submit" name="postUpdate" class="btn btn-sm btn-danger col-md-12">Update</button>
                </div>
                <div class="group-form col-md-2">
                    <label class="form_label"></label>
                    <a href="pricing.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                            <?php
                        }
                    ?>   
                </div>
            </div>
        </form></br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Select Services</label>
                        <select class="form-controls form-control-sm" required name="ser" id="ser">
                                <option value="">Select Services</option> 
                                    <?php
                                        $query="SELECT DISTINCT `title` FROM `services` ORDER BY `sid` ASC";
                                        $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                        while($loca=mysqli_fetch_array($confirm))
                                    {?>
                                        <option><?php echo $loca['title']; ?></option>
                                    <?php   
                                    }   
                                ?>   
                        </select>
                    </div>
                    <div class="group-form col-md-2">
                        <label class="form_label"></label>
                        <button type="submit" name="search" class="btn btn-sm btn-success col-md-12">search</button>
                    </div>
                </div>
            </form>
        <hr />
        </div>
        <div class="table-responsive" style="overflow-y:scroll; height: 380px; width:80% margin-left: 100px;">
            
            <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>Services</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!isset($_POST['search'])){
                        $qry="select * from products";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $row['pid'] ?></td>
                                <td><?php echo $row['services'] ?></td>
                                <td><?php echo $row['productName'] ?></td>
                                <td><?php echo $row['unitRate'] ?></td>
                            <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                            <td class="text-center">
                                    <a href="pricing.php?edit=<?php echo $row['pid']?>"><button class="btn btn-sm btn-danger">Edit</button> </a>
                                    <!-- <a onclick="del(<?php echo $row['pid']; ?>)"><button class="btn btn-sm btn-danger deletebutton" type="button">Delete</button></a> -->
                                </td> 
                            </tr>
                        <?php 
                        }
                    }else
                        {
                            $name=$_POST['ser'];
                            $qry="SELECT * FROM `products` WHERE `services`='$name'";
                            $exc=mysqli_query($conn,$qry);
                            while($row=mysqli_fetch_array($exc))
                            {
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $row['pid'] ?></td>
                                    <td><?php echo $row['services'] ?></td>
                                    <td><?php echo $row['productName'] ?></td>
                                    <td><?php echo $row['unitRate'] ?></td>
                                <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                                <td class="text-center">
                                        <a href="pricing.php?edit=<?php echo $row['pid']?>"><button class="btn btn-sm btn-danger">Edit</button> </a>
                                        <!-- <a onclick="del(<?php echo $row['pid']; ?>)"><button class="btn btn-sm btn-danger deletebutton" type="button">Delete</button></a> -->
                                    </td> 
                                </tr>
                            <?php 
                            }
                        }
                    
                ?>
            </tbody>
            </table>
        </div>
    
</main>



<?php include("footer.php"); ?>


<script>
  function del(pid){
    if(confirm("Are you sure?")==true){
      location = "pricing_submit.php?del="+pid;
    }else {

    }
  }
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
