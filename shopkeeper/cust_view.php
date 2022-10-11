
<?php include("sidebar.php");

$update='true'; $ser=""; $item=""; $rate="";

?>


<link href="assets/css/foms.css" rel="stylesheet">

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">View Customers</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>



<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <div class="table-responsive" style="overflow-y:scroll; height: 380px; width:80% margin-left: 100px;">
            <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Full Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $qry="select * from customer";
                    $exc=mysqli_query($conn,$qry);
                    while($row=mysqli_fetch_array($exc)){
            
                    ?>
                    <tr class="text-center">
                        <td><?php echo $row['cid'] ?></td>
                        <td><?php echo $row['full'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['adds'] ?></td>
                    <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                    <td class="text-center">
                            <a href="add_cust.php?edit1=<?php echo $row['cid']?>"><button class="btn btn-sm btn-danger">view</button> </a>
                            <a href="add_cust.php?edit=<?php echo $row['cid']?>"><button class="btn btn-sm btn-primary">Edit</button> </a>
                            <!-- <a onclick="del(<?php echo $row['cid']; ?>)"><button class="btn btn-sm btn-danger deletebutton" type="button">Delete</button></a> -->
                        </td> 
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
  function del(cid){
    if(confirm("Are you sure?")==true){
      location = "cust_submit.php?del="+cid;
    }else {

    }
  }
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
