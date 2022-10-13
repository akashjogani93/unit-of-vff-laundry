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
             <h2 class="" style=" font-weight: 600">Customer Orders Complited</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>



<!-- Viewing Registered Users -->
<main class="page-content">
<div class="container">

    

            <!-- <form action="" method="post" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Select Status</label>
                        <select class="form-controls form-control-sm" required name="ser" id="ser" onchange="show1()">
                                <option value="">Select Status</option> 
                                <option>Counter</option> 
                                <option>Online</option> 
                        </select>
                    </div>
                    <div style="margin-top:10px;" class="group-form col-md-2">
                        <label class="form_label"></label>
                        <button type="submit" name="search" class="btn btn-sm btn-success col-md-12">Search</button>
                        
                    </div>
                    <div style="margin-top:10px;" class="group-form col-md-2">
                        <label class="form_label"></label>
                        <a href="Complited_orders.php"  class="btn btn-sm btn-warning col-md-12">Refresh</a>
                    </div>
                </div>
            </form>
                                </br>
                                </br> -->

<div class="table-responsive" style="overflow-y:scroll; height: 580px; width:100%;">
    <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Status</th>                   
                    <th>Order</th>                   
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!isset($_POST['search']))
                    {
                        $qry="SELECT DISTINCT `couterorder`.`coId`,`customer`.`full`,`customer`.`mobile`,`couterorder`.`status`,`couterorder`.`orderType`FROM `couterorder`,`customer` WHERE `couterorder`.`cid`=`customer`.`cid` AND `couterorder`.`status` = '4' ORDER BY `coId` ASC";
                        $confirm=mysqli_query($conn,$qry);
                        while($out=mysqli_fetch_array($confirm))
                        {
                            if($out['status'] == 4)
                            {
                                $status = "Complited";
                            }
                        ?>
                        <tr class="text-center"> 
                            <td><?php echo $out['coId']; ?></td>
                            <td><?php echo $out['full']; ?></td>
                            <td><?php echo $out['mobile']; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo $out['orderType']; ?></td>
                           <td class="text-center"><a href="complet_invoice.php?invoice=<?php echo $out['coId'];?>" class="btn btn-sm btn-danger">Invoice</a></td>
                        </tr>
                        <?php }
                    }
                    else
                    {
                        $sta=$_POST['ser'];
                        if($sta='Counter')
                        {
                            $qry="SELECT DISTINCT `couterorder`.`coId`,`customer`.`full`,`customer`.`mobile`,`couterorder`.`status`,`couterorder`.`orderType`  FROM `couterorder`,`customer` WHERE `couterorder`.`cid`=`customer`.`cid` AND `couterorder`.`status` = '4' AND `couterorder`.`orderType` = 'Counter' ORDER BY `coId` ASC";
                            $confirm=mysqli_query($conn,$qry);
                            while($out=mysqli_fetch_array($confirm))
                            {
                                if($out['status'] == 4)
                                {
                                    $status = "Complited";
                                }
                            ?>
                            <tr class="text-center"> 
                                <td><?php echo $out['coId']; ?></td>
                                <td><?php echo $out['full']; ?></td>
                                <td><?php echo $out['mobile']; ?></td>
                                <td><?php echo $status; ?></td>
                               <td class="text-center"><a href="complet_invoice.php?invoice=<?php echo $out['coId'];?>" class="btn btn-sm btn-danger">Invoice</a></td>
                            </tr>
                            <?php }
                        }
                        else
                        {
                            $qry="SELECT DISTINCT `couterorder`.`coId`,`customer`.`full`,`customer`.`mobile`,`couterorder`.`status`,`couterorder`.`orderType`  FROM `couterorder`,`customer` WHERE `couterorder`.`cid`=`customer`.`cid` AND `couterorder`.`status` = '4' AND `couterorder`.`orderType` = 'Online' ORDER BY `coId` ASC";
                            $confirm=mysqli_query($conn,$qry);
                            while($out=mysqli_fetch_array($confirm))
                            {
                                if($out['status'] == 4)
                                {
                                    $status = "Complited";
                                }
                            ?>
                            <tr class="text-center"> 
                                <td><?php echo $out['coId']; ?></td>
                                <td><?php echo $out['full']; ?></td>
                                <td><?php echo $out['mobile']; ?></td>
                                <td><?php echo $status; ?></td>
                               <td class="text-center"><a href="complet_invoice.php?invoice=<?php echo $out['coId'];?>" class="btn btn-sm btn-danger">Invoice</a></td>
                            </tr>
                            <?php }
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
    $(document).ready(function () {
    $('#example').DataTable();
});

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

</script>