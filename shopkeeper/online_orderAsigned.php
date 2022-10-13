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
             <h2 class="" style=" font-weight: 600">Online Order Asigned For Pickup</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>

<!-- Viewing Registered Users -->
<main class="page-content">
    
    
<div class="container">
<a href="online_orderPickuped.php" style="float:right" class="btn btn-sm btn-danger">Pickuped</a></br></br>

<div class="table-responsive" style="overflow-y:scroll; height: 580px; width:100%;">
    <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Delevery Boy</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Status</th>                   
                </tr>
            </thead>
            <tbody>
                <?php 
                $qry="SELECT DISTINCT `couterorder`.`coId`,`couterorder`.`deleveryType`,`customer`.`full`,`customer`.`mobile`,`couterorder`.`status`,`couterorder`.`bid`  FROM `couterorder`,`customer` WHERE `couterorder`.`cid`=`customer`.`cid` AND `couterorder`.`status` = '11' AND `couterorder`.`deleveryType` = 'Delivery Boy' AND `couterorder`.`bid` = '$bid' ORDER BY `coId` ASC";

                $confirm=mysqli_query($conn,$qry);
                while($out=mysqli_fetch_array($confirm))
                {
                    $coId=$out['coId'];
                    $qry1="SELECT `did` FROM `order_asign` WHERE `coId`='$coId'";
                    $confirm1=mysqli_query($conn,$qry1);
                    while($out1=mysqli_fetch_array($confirm1))
                    {
                        $did=$out1['did'];
                        $qry2="SELECT `full` FROM `staff` WHERE `id`='$did'";
                        $confirm2=mysqli_query($conn,$qry2);
                        while($out2=mysqli_fetch_array($confirm2))
                        {
                            $full=$out2['full'];
                        }
                    }
                    if($out['status'] == 11)
                    {
                        $status = "Asigned For Pickup";
                    }
                ?>
                <tr class="text-center"> 
                    <td><?php echo $coId; ?></td>
                    <td><?php echo $full; ?></td>
                    <td><?php echo $out['full']; ?></td>
                    <td><?php echo $out['mobile']; ?></td>
                    <td><?php echo $status; ?></td>
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
</script>

<!-- <script>
    $(document).ready(function() {
        $('#changeStatus').click(function(){
            var newOrderId = [];
            $.each($("input[name='underprocess']:checked"), function(){            
                newOrderId.push($(this).val());
            });
            
            let log = $.ajax({
                url: 'ajaxrequest/changeOrderStatus.php',
                type: "POST",
                data: {
                    request1 : 'cheakedNewOrders1',
                    newOrderIds1 : newOrderId,
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
                    request1 : 'oneNewOrders1',
                    newOrderIds1 : newOrderId,
                },
                success: function(data) {
                        alert(data);
                        location.reload();
                }
            });
            console.log(log);
        });
    });

</script> -->