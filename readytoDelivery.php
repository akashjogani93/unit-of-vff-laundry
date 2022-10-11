<?php include("sidebar.php");

$bid="";
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
    <!-- Button trigger modal -->

<!-- Modal -->

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Select Branch</label>
                        <select class="form-controls form-control-sm" required name="ser" id="ser" onchange="show1()">
                                <option value="">Select Branch</option> 
                                    <?php
                                        $query="SELECT DISTINCT `bid`,`bname` FROM `branch` ORDER BY `bid` ASC";
                                        $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                        while($loca=mysqli_fetch_array($confirm))
                                    {?>
                                        <option value="<?php echo $loca['bid']; ?>"><?php echo $loca['bname']; ?></option>
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
                        <a href="readytoDelivery.php"  class="btn btn-sm btn-warning col-md-12">Refresh</a>
                    </div>
                </div>
            </form>
                                </br>
                                </br>




<div id="show">
    <center><button type="button" class=" btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Asign Order</button></center>
</div>

<script>
    document.getElementById("show").style.display= "none";
    function show1()
    {
        var asi=$('#ser').val();
        if(asi==0)
        {
                document.getElementById("show").style.display= "none";
                
        }
        else
        {
            
        }
        
    }
</script>


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
                    if(!isset($_POST['search']))
                    {

                    }
                    else
                    {
                        
                        $bid=$_POST['ser'];
                        if($bid==0)
                        {
                            
                        }else
                        {
                            ?>
                                <script>
                                    document.getElementById("show").style.display= "";
                                </script>
                            <?php
                        }

                        
                        $qry="SELECT DISTINCT `couterorder`.`coId`,`couterorder`.`deleveryType`,`customer`.`full`,`customer`.`mobile`,`couterorder`.`status`,`branch`.`bid` FROM `couterorder`,`customer`,`branch` WHERE `couterorder`.`cid`=`customer`.`cid` AND `couterorder`.`status` = '2' AND `couterorder`.`deleveryType` = 'Delivery Boy' AND `couterorder`.`bid` = '$bid' ORDER BY `coId` ASC";
                        $confirm=mysqli_query($conn,$qry);
                        while($out=mysqli_fetch_array($confirm))
                        {
                            if($out['status'] == 2)
                            {
                                $status = "Ready To Deliver";
                            }
                            
                        ?>
                        <tr class="text-center"> 
                            <td><input type="checkbox" name="asign" value="<?php echo $out['coId']; ?>" class="form-control form-control-sm"></td>
                            <td><?php echo $out['coId']; ?></td>
                            <td><?php echo $out['full']; ?></td>
                            <td><?php echo $out['mobile']; ?></td>
                            <td><?php echo $status; ?></td>
                        <td class="text-center"><a href="receipt_order.php?view=<?php echo $out['coId'];?>" class="btn btn-sm btn-danger">view</a> 
                        </td>
                        </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>



    
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select And Asign Delevery Boy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Select Branch</label>
                        <select class="form-controls form-control-sm" required name="bid" id="bid" onchange="service1()">
                                <?php $query1="SELECT `bname` FROM `branch` WHERE `bid`='$bid'";
                                    $confirm1=mysqli_query($conn,$query1);
                                    while($out1=mysqli_fetch_array($confirm1))
                                    {
                                        $bname=$out1['bname'];
                                        ?>
                                        <option value="<?php echo $bid; ?>"><?php echo $bname; ?></option>
                                        <?php
                                    }
                                ?> 
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Select:</label>
                        <select class="form-controls form-control-sm" required name="delivey" id="delivey">
                            <option value="">Select</option>
                            <?php   $sql = "SELECT `id`,`full` FROM `staff` WHERE `bid` = '$bid' AND `des`='Delevery Boy' AND `status`='inactive'";
                                    $conf=mysqli_query($conn,$sql);
                                    while($out2=mysqli_fetch_array($conf))
                                    {
                                        $full=$out2['full'];
                                        $id=$out2['id'];
                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $full; ?></option>
                                        <?php
                                    }
                                ?> 
                            
                                
                    </select>
                    </div>
                    <div class="group-form col-md-4">
                    <input type="hidden" class="form-control form-control-sm" required name="date" id="date" placeholder="Add date"/>
                    <script>
                        $(document).ready( function() {
                          var yourDateValue = new Date();
                          var formattedDate = yourDateValue.toISOString().substr(0, 10)
                        $('#date').val(formattedDate);
                        });
                    </script>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="changeStatus btn btn-sm btn-primary" id="changeStatus">Add To Delevery</button>
            </div>
        </div>
    </div>
</div>
</div>
</main>
<?php include("footer.php"); ?>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});

    $(document).ready(function() {
        $('#changeStatus').click(function()
        {
            var delivey=$('#delivey').val();
            var bid=$('#bid').val();
            var date=$('#date').val();
            var newOrderId = [];
            $.each($("input[name='asign']:checked"), function(){            
                newOrderId.push($(this).val());
                
            //alert(delivey); 
            });
            
            let log = $.ajax({
                url: 'ajaxrequest/asignorder.php',
                type: "POST",
                data: {
                    request : 'cheakedNewOrders',
                    newOrderIds : newOrderId,
                    delivey : delivey,
                    bid : bid,
                    date : date,
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
 
<script>
function service1() {
    //alert('hii');
    var bid = $('#bid').val();
    //alert(bid);
    let log = $.ajax({
        url: 'ajaxrequest/asignBranch.php',
        type: "POST",
        dataType: 'json',
        data: {
            bid: bid,
        },
        success: function(data) {
            console.log(data);
            //alert(data);
            $("#delivey option").remove();
            var opt = document.createElement("option");
            opt.text = "Select..";
            opt.value = "";
            var x = document.getElementById("delivey");
            x.add(opt);
            for (var i = 0; i < data.length; i++) {
                var option = document.createElement("option");
                option.text = data[i].full;
                option.value = data[i].id;
                x.add(option);
            }
        }
    });
    
}
</script>