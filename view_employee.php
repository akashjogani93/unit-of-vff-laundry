
<?php include("sidebar.php");
include("connect.php");
?>


<link href="assets/css/foms.css" rel="stylesheet">

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">View Employee Details</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>



<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Select Designation</label>
                        <select class="form-controls form-control-sm" required name="ser" id="ser">
                                <option value="">Select Designation</option> 
                                    <?php
                                        $query="SELECT DISTINCT `des` FROM `staff` ORDER BY `id` ASC";
                                        $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                        while($loca=mysqli_fetch_array($confirm))
                                    {?>
                                        <option><?php echo $loca['des']; ?></option>
                                    <?php   
                                    }   
                                ?>   
                        </select>
                    </div>
                    <div style="margin-top:10px;" class="group-form col-md-2">
                        <label class="form_label"></label>
                        <button type="submit" name="search" class="btn btn-sm btn-success col-md-12">Search</button>
                    </div>
                    <div style="margin-top:10px;" class="group-form col-md-2">
                        <label class="form_label"></label>
                        <a href="view_employee.php"  class="btn btn-sm btn-warning col-md-12">Refresh</a>
                    </div>
                </div>
            </form>
        <hr />
        <div class="table-responsive" style="overflow-y:scroll; height: 500px; width:80% margin-left: 100px;">
            <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Sl.No</th>
                    <th>Full Name</th>
                    <th>Mobile</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!isset($_POST['search']))
                    {
                        $qry="select * from staff";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                        ?>
                            <tr class="text-center">
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['full'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <td><?php echo $row['des'] ?></td>
                                <td><?php echo $row['adds'] ?></td>
                            <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                            <td class="text-center">
                                    <a href="add_employee.php?edit=<?php echo $row['id']?>"><button class="btn btn-sm btn-danger">View</button> </a>
                                    <a href="add_employee.php?edit1=<?php echo $row['id']?>"><button class="btn btn-sm btn-primary">Edit</button> </a>
                                    <!-- <a onclick="del(<?php echo $row['id']; ?>)"><button class="btn btn-sm btn-danger deletebutton" type="button">Delete</button></a> -->
                                </td> 
                            </tr>
                        <?php
                        }
                    }else
                        {
                            $name=$_POST['ser'];
                            $qry="SELECT * FROM `staff` WHERE `des`='$name'";
                            $exc=mysqli_query($conn,$qry);
                            while($row=mysqli_fetch_array($exc))
                            {
                            ?>
                                <tr class="text-center">
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['full'] ?></td>
                                    <td><?php echo $row['mobile'] ?></td>
                                    <td><?php echo $row['des'] ?></td>
                                    <td><?php echo $row['adds'] ?></td>
                                <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                                <td class="text-center">
                                        <a href="add_employee.php?edit1=<?php echo $row['id']?>"><button class="btn btn-sm btn-danger">View</button> </a>
                                        <a href="add_employee.php?edit=<?php echo $row['id']?>"><button class="btn btn-sm btn-primary">Edit</button> </a>
                                        <!-- <a onclick="del(<?php echo $row['id']; ?>)"><button class="btn btn-sm btn-danger deletebutton" type="button">Delete</button></a> -->
                                    </td> 
                                </tr>
                            <?php
                        }
                        }
                ?>
            </tbody>
            </table>
        </div>
    </div>


</main>



<?php include("footer.php"); ?>


<script>
  function del(id){
    if(confirm("Are you sure?")==true){
      location = "add_emp.php?del="+id;
    }else {

    }
  }
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
