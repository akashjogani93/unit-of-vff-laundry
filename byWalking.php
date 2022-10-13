<?php include("sidebar.php");
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
             <h2 class="" style=" font-weight: 600">Counter Customer List</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>

<!-- Viewing Registered Users -->
<main class="page-content">
    
<div class="container">
    
<?php //echo date('d-m-Y');?>
<a href="complited_orders.php" style="float:right" class="btn btn-sm btn-danger">Complited</a></br></br>
<div class="table-responsive" style="overflow-y:scroll; height: 580px; width:100%;">
    <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Status</th>                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $qry="SELECT DISTINCT `couterorder`.`coId`,`couterorder`.`deleveryType`,`customer`.`full`,`customer`.`mobile`,`couterorder`.`status`  FROM `couterorder`,`customer` WHERE `couterorder`.`cid`=`customer`.`cid` AND `couterorder`.`status` = '2' AND `couterorder`.`deleveryType` = 'By Counter' ORDER BY `coId` ASC";
                $confirm=mysqli_query($conn,$qry);
                while($out=mysqli_fetch_array($confirm))
                {
                    if($out['status'] == 2)
                    {
                        $status = "INFORM";
                    }
                ?>
                <tr class="text-center"> 
                    <td><?php echo $out['coId']; ?></td>
                    <td><?php echo $out['full']; ?></td>
                    <td><?php echo $out['mobile']; ?></td>
                    <td><?php echo $status; ?></td>
                   <td class="text-center"><a href="receipt_order.php?view=<?php echo $out['coId'];?>" class="btn btn-sm btn-danger">view</a>
                   <a href="complet.php?invoice=<?php echo $out['coId'];?>" class="btn btn-sm btn-primary">Complete</a> 
                   <!--<button value="<?php echo $out['coId']; ?>" class="btn btn-sm btn-danger changeSingleStatus">Colete</button>--> </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
</main>
<?php include("footer.php"); ?>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});

    $(document).ready(function() {
        
        $('.changeSingleStatus').click(function(){
           var  newOrderId = $(this).val();
            let log = $.ajax({
                url: 'ajaxrequest/changeOrderStatus.php',
                type: "POST",
                data: {
                    request2 : 'oneNewOrders2',
                    newOrderIds2 : newOrderId,
                },
                success: function(data) {
                        //alert(data);
                        location.reload();
                }
            });
            console.log(log);
        });
    });

</script>