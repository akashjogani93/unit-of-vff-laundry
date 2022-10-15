




<?php 
    include("connect.php");
    include("link.php");

?>


<style>
        .form-group{
            display:inline-block;
            font-size:12px;
        }
        .table{
            width:93%;
            margin-left:30px;
        }
      
        th{
            font-size:14px;
        }
        td{
         
            margin-left:5px;
            font-size:12px;
        }
        .table td, .table th {
            padding: 8px;
            margin-left:10px;
        }

    
        p {
            margin-top: 0;
            margin-bottom: 0rem;
        }
        img{
            width:80px;
            height:80px;
            float:left;
           margin-left:10px;
           margin-top:20px;
  
        }

        .form-group {
    margin-bottom: 0px;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding:0;
}
.panel-title{
    margin-top:10px;
}

        </style>
    <body>


    <?php
    if(isset($_GET['invoice']))
    {
        
        $CoId=$_GET['invoice'];
        echo $CoId;
        $qry1="SELECT `couterorder`.*,`invoice`.* FROM `couterorder`,`invoice` WHERE `couterorder`.`coId`='$CoId' AND `invoice`.`coId`='$CoId'";
        $confirm=mysqli_query($conn,$qry1);
        while($out=mysqli_fetch_array($confirm))
        {
            $id=$out['id'];
            $bid=$out['bid'];
            $cid=$out['cid'];
            $date=$out['date'];
            $pickupDate=$out['pickupDate'];
            $paymentType=$out['paymentType'];
            $paymentMode=$out['paymentMode'];
            if($paymentType == 'Now')
            {
                $payment = "Paid";
            }
            else
            {
                if($paymentType == 'Advance')
                {
                    $payment = "Advance";
                }
                else
                {
                    $payment = "Unpaid";
                }
            }
            
            ?>
        <form>   
           <div class="card container" >
               <div class="card-body">            
                        <div class="panel-heading">                    
                            <div class="panel-title">
                                <?php
                                $qr="SELECT * FROM `branch` WHERE `bid`='$bid' ";
                                $con=mysqli_query($conn,$qr);
                                while($o=mysqli_fetch_array($con)) 
                                {
                                    ?>     
                                        <img src="assets/image/vff.png">
                                        <center><P style="float:right;"><b>GSTIN:- <?php echo $o['gst']; ?></b></p><h6 style="margin-left:40px;">UNIT OF VFF GROUP</h6> </center>
                                        <center><h5 style="margin-right:170px;">VFD LAUNDRY</h5> </center>
                                        <center>
                                        <div style="margin-right:170px;">
                                            <p><?php echo $o['adds']; ?></p>
                                            <p style="margin-left:100px;">Mobile Number :- <?php echo $o['mobile']; ?></p> </center>
                                        </div>
                                    <?php
                                }
                                    ?>
                                            <hr>
                            </div>
                        </div>
                        <?php
                        $q="SELECT * FROM `customer` WHERE `cid`='$cid' ";
                        $co=mysqli_query($conn,$q);
                        while($ou=mysqli_fetch_array($co)) 
                        { 
                            ?>
                            <div class="row">
                                <div class="col-sm-9" style="margin-left: 30px;">
                                    <div class="form-group">
                                        <label><b>Customer Name:- </b><?php echo $ou['full']; ?></label>
                                    </div>
                                </div>
                                <div class="col-offset-sm-4" style="margin-left: 30px;">
                                    <div class="form-group">
                                        <label><b>Date:- </b><?php echo $date; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9" style="margin-left: 30px;">
                                    <div class="form-group">
                                        <label><b>Mobile:- </b><?php echo $ou['mobile']; ?></label>
                                    </div>
                                </div>
                                <div class="col-offset-sm-4" style="margin-left: 30px;">
                                    <div class="form-group">
                                    <label><b>Invoice No:- VFD/<?php echo $id; ?></b></label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9" style="margin-left: 28px;">
                                    <div class="form-group">
                                        <label><b> Address:- </b><?php echo $ou['hno']." ".$ou['adds']; ?></label>
                                    </div>
                                </div>
                                <div class="col-offset-sm-4" style="margin-left: 30px;">
                                    <div class="form-group">
                                    <label><b>Cust-GST:- </b><?php echo $ou['gstn']; ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8" style="margin-left: 28px;">
                                    <div class="form-group">
                                        <label><b> Landmark:- </b><?php echo $ou['land']; ?></label>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-8" style="margin-left: 28px;">
                                    <div class="form-group">
                                        <label><b> Del-Address:- </b><?php echo $ou['adds1']; ?></label>
                                    </div>
                                </div>
                                
                            </div>
                            <?php
                        
                        }
                        ?>
                        
                       <hr>
                    






            <table id="example" class="table table-bordered cell-border mb-5">
            <thead>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2">Perticuler </th>
                    <th>Rate</th>
                    <th>Quantity</th>
                    <th>Total Weight In Gram</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody class="order-data">
                <?php
                $grossAmount=$out['grossAmount'];
                $discountPer=$out['discountPer'];
                $discount=$out['discount'];
                $gst=$out['gst'];
                $gst1=$gst/2;
                $totAmount=$out['totAmount'];
                $advanceType=$out['advanceType'];
                $remainType=$out['remainType'];
                
                
                
                $qry2="SELECT * FROM `counterproduct` WHERE `coId`='$CoId' ";
                $confirm2=mysqli_query($conn,$qry2);
                while($out2=mysqli_fetch_array($confirm2))
                {
                    $punit=$out2['unit'];
                    $pqty=$out2['pqty'];
                    $weight=$out2['weight'];
                    $prate=$out2['rate'];
                    $pamount=$out2['amount'];
                    $pid=$out2['pid'];
                    $tpid=$out2['tpid'];

                    $qry3="SELECT * FROM `products` WHERE `pid`='$pid' ";
                    $confirm3=mysqli_query($conn,$qry3);
                    while($out3=mysqli_fetch_array($confirm3))
                    {
                        $services=$out3['services'];
                        $productName=$out3['productName'];

                        $sn=0;
                        $sn=$sn+1;
                        $qry="SELECT * FROM `counteraddon` WHERE `tpid`='$tpid' AND `pid`='$pid' ";
                        $confirm1=mysqli_query($conn,$qry);
                        $a = 0;
                        $rowNo =  mysqli_num_rows($confirm1);
                        $no = $rowNo+2; 
                        ?>
                        <item>
                            <tr>
                                <th rowspan="<?php echo $no; ?>"><?php echo $sn; ?>.</th>
                                <th>Service</th>
                                <th colspan="5"><?php echo $services." ( ".$punit." Wise )"; ?></th>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <td colspan="2"><?php echo $productName ?></td>
                                <td><?php echo $prate; ?></td>
                                <td><?php echo $pqty; ?></td>
                                <td><?php echo $weight; ?></td>  
                                <td><?php echo $pamount; ?></td>
                            </tr>

                            <?php while($row=mysqli_fetch_array($confirm1))
                            {?>
                                <tr>
                                    <?php if($a==0){?>
                                        <th rowspan="<?php echo $rowNo; ?>">Addons</th>
                                    <?php $a++; } ?>
                                    <td colspan="2"><?php echo $row['addon']; ?></td>
                                    <td><?php echo $row['arate']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td> - </td>
                                    <td><?php echo $row['total']; ?></td>
                                </tr>
                                <?php
                            } 
                            ?>
                        </item>
                        <?php
                    }
                }
            ?>
            <totalBill>
                <tr>
                    <th colspan="6" rowspan="6"></th>
                    <th>Basic Amount</th>
                    <th>
                        <input type="hidden" id="grossTotal" disabled value="<?php echo $grossTotal; ?>"/>
                        <?php echo $grossAmount; ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h6>Discount <?php echo $discountPer; ?>%
                        </h6>
                    </th>
                    <th id="discount"><?php echo $discount; ?></th>
                </tr>
                <tr>
                    <th>CGST 9%</th>
                    <th id="cgst"><?php echo $gst1; ?></th>
                </tr>
                <tr>
                    <th>SGST 9%</th>
                    <th id="sgst"><?php echo $gst1; ?></th>
                </tr>
                <?php 
                    if($advanceType==0)
                    {
                        
                    }else
                    {
                        ?>
                            <tr>
                                <th>Advance Paid</th>
                                <th id="sgst"><?php echo $advanceType; ?></th>
                            </tr>
                            <tr>
                                <th>Remaining Amount</th>
                                <th id="sgst"><?php echo $remainType; ?></th>
                            </tr>
                        <?php
                    }
                ?>
            </totalBill>
            </tbody>
            <thead>
                <tr>
                    <th colspan="6"></th>
                    <th>Total</th>
                    <th id="billAmt"><?php echo $totAmount; ?></th>
                </tr>
            </thead>
            </table> 
        </div>
        </div>
        </div>
            <?php
        }
    }
                    
?>
<script>
    $(document).ready(function() {
    print();
    });
</script>
<script>
$(document).ready(function() {
    
    $('#example').DataTable({
        "ordering": false
    });

});
</script>