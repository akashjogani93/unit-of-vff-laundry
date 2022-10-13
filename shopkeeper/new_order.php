<?php include("sidebar.php");
$id=$_SESSION["id"];
$_SESSION['bname']=$branch;
$_SESSION['bid']=$bid;
 ?>

<style type="text/css">
    .table-bordered tr th {
        background-color: #aee7e8;
        color: #000000;
    }
</style>

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">New Counter List</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>

<!-- Viewing Registered Users -->
<main class="page-content">
    
<div class="container">
    
<center><button type="button" class="changeStatus btn btn-sm btn-primary" id="changeStatus">Add To Process</button></center>
<a href="uderprocess.php" style="float:right" class="btn btn-sm btn-danger">Go For Underprocess</a></br></br>
<div class="table-responsive" style="overflow-y:scroll; height: 580px; width:100%;">
    <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Status</th>                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $qry="SELECT DISTINCT `couterorder`.`coId`,`couterorder`.`bid`,`customer`.`full`,`customer`.`mobile`,`couterorder`.`status`  FROM `couterorder`,`customer` WHERE `couterorder`.`cid`=`customer`.`cid` AND `couterorder`.`bid`='$bid' AND `couterorder`.`status` = '0' ORDER BY `coId` ASC";
                $confirm=mysqli_query($conn,$qry);
                while($out=mysqli_fetch_array($confirm))
                {
                    if($out['status'] == 0)
                    {
                        $status = "New Order";
                    }
                ?>
                <tr class="text-center"> 
                    <td><input type="checkbox" name="newOrder" value="<?php echo $out['coId']; ?>" class="form-control form-control-sm"></td>
                    <td><?php echo $out['coId']; ?></td>
                    <td><?php echo $out['full']; ?></td>
                    <td><?php echo $out['mobile']; ?></td>
                    <td><?php echo $status; ?></td>
                   <td class="text-center"><a href="receipt_order.php?view=<?php echo $out['coId'];?>" class="btn btn-sm btn-danger">view</a> 
                   <button value="<?php echo $out['coId']; ?>" class="btn btn-sm btn-primary changeSingleStatus">change</button> </td>
                </tr>
                <?php }?>
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

    $(document).ready(function() {
        $('#changeStatus').click(function(){
            var newOrderId = [];
            $.each($("input[name='newOrder']:checked"), function(){            
                newOrderId.push($(this).val());
            });
            
            let log = $.ajax({
                url: 'ajaxrequest/changeOrderStatus.php',
                type: "POST",
                data: {
                    request : 'cheakedNewOrders',
                    newOrderIds : newOrderId,
                },
                success: function(data) {
                        alert(data);
                        location.reload();
                }
            });
            console.log(log);
        });


        $('.changeSingleStatus').click(function(){
           var  newOrderId = $(this).val();
            let log = $.ajax({
                url: 'ajaxrequest/changeOrderStatus.php',
                type: "POST",
                data: {
                    request : 'oneNewOrders',
                    newOrderIds : newOrderId,
                },
                success: function(data) {
                        alert(data);
                        location.reload();
                }
            });
            console.log(log);
        });
    });

</script>