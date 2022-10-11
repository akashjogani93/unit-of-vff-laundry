<?php  require("../connect.php"); ?>

    <table id="example" class="table table-bordered cell-border mb-5" style="width:100%">
        <thead>
            <tr>
                <th colspan="2"></th>
                <th colspan="2">Particuler </th>
                <th>Rate</th>
                <th>Quantity</th>
                <th style="widht:15%;">Weight In Gram</th>
                <th>Amount</th>
                <th style="widht:12%;">Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="order-data">

        <?php
			$sn= $grossTotal = $productTotal = $addonTotal = 0;
			$qry="SELECT `products`.`services`,`products`.`productName`,`tempproduct`.* FROM `tempproduct`,`products` WHERE `products`.`pid` = `tempproduct`.`pid`;";
			$confirm=mysqli_query($conn,$qry);
			while($out=mysqli_fetch_array($confirm))
			{

            $sn=$sn+1;
            $qry="SELECT * FROM `tempaddon` WHERE `tpid`=".$out['tpid'].";";
            $confirm1=mysqli_query($conn,$qry);
            $a = 0;
            $rowNo =  mysqli_num_rows($confirm1);
            $no = $rowNo+2; ?>
            <item>
                <tr>
                    <th rowspan="<?php echo $no; ?>"><?php echo $sn; ?>.</th>
                    <th>Service</th>
                    <th colspan="8"><?php echo $out['services']." ( ".$out['unit']." Wise )"; ?></th>
                </tr>
                <tr>
                    <th>Product</th>
                    <td colspan="2"><?php echo $out['productName']; ?></td>
                    <td><?php echo $out['rate']; ?></td>
                    <td><?php echo $out['pqty']; ?></td>
                    <td><?php echo $out['weight']; ?></td>  
                    <td><?php echo number_format($out['amount'],2); ?></td>  
                    <th rowspan="<?php echo $no-1; ?>"><?php echo $out['remark']; ?></td>  
                    <th rowspan="<?php echo $no-1; ?>"><br/><br/><button class="btn btn-sm btn-danger" type="submit" id="dele" onclick="deleted(<?php echo $out['tpid']; ?>)">Delete</button></th>
                </tr>
                <?php while($row=mysqli_fetch_array($confirm1))
                {?>
                <tr>
                    <?php if($a==0){?>
                        <th rowspan="<?php echo $rowNo; ?>">Addons</th>
                    <?php $a++; } ?>
                    <td colspan="2"><?php echo $row['addon']; ?></td>
                    <td><?php echo $row['rate']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td> - </td>
                    <td><?php echo number_format($row['total'],2); ?></td>
                </tr>
                <?php $addonTotal += $row['total']; } ?>
            </item>
            
            <?php $productTotal += $out['amount']; } 
            $grossTotal = $productTotal + $addonTotal;
            ?>

            <totalBill>
                <tr>
                    <th colspan="6" rowspan="5"></th>
                    <th>Basic Amount</th>
                    <th colspan="3">
                        <input type="hidden" id="grossTotal" disabled value="<?php echo $grossTotal; ?>"/>
                        <?php echo number_format($grossTotal,2); ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h6>Discount
                            <input type="number" id="disPer" style="width: 45px;">
                            %
                        </h6>
                    </th>
                    <th colspan="3" id="discount">00.00</th>
                </tr>
                <tr>
                    <th>CGST 9%</th>
                    <th colspan="3" id="cgst">00.00</th>
                </tr>
                <tr>
                    <th>SGST 9%</th>
                    <th colspan="3" id="sgst">00.00</th>
                </tr>
            </totalBill>

        </tbody>
        <thead>

            <tr>
                <th colspan="6"></th>
                <th>Total</th>
                <th colspan="3" id="billAmt">00.00</th>
            </tr>
        </thead>

        <tbody class="mt-5">
            <tr style="background-color: #FDF3F3;">
                <th colspan="9">
                    <div class="row">
                        <div class="m-3 col-3">
                            <label class="form_label" for="company_name">Payment Type</label>
                            <select class="form-controls form-control-sm" style="border: 1px solid #dee2e6;" required name="ptype" id="paymentType" onchange="user1()">
                                <option value="">Select Type</option>
                                <option>Now</option>
                                <option>Advance</option>
                                <option>On Delivery</option>
                            </select>
                        </div>
                        <div class="m-3 col-3">
                            <div id="hides2">
                                <label class="form_label" for="company_name">Payment Mode</label>
                                <select class="form-controls form-control-sm" style="border: 1px solid #dee2e6;" name="ptmode" id="paymentMode">
                                    <option value="">Select Type</option>
                                    <option>Cash</option>
                                    <option>Online</option>
                                </select>
                            </div>
                        </div>
                        <div class="m-3 col-2">
                            <div id="hides">
                                <label class="form_label" for="company_name">Advance Payment</label>
                                <input type="text" style="border: 1px solid #dee2e6;" class="form-controls form-control-sm" name="advance" id="advanceType">
                            </div>
                        </div>

                        <div class="m-3 col-2">
                            <div id="hides1">
                                <label class="form_label" for="company_name">Remaining Amount</label>
                                <input type="text" style="border: 1px solid #dee2e6;" class="form-controls form-control-sm" name="remain" id="remainType" >
                            </div>
                        </div>
                        
                        
                    </div>
                </th>
                
            </tr>
            <tr>
                <th colspan="2">
                    <div class="col-md-12">
                        <button type="submit" onclick="addOrder()"
                            class="btn btn-sm btn-success col-md-12" id="addBill">Submit</button>
                    </div>
                </th>
                <th colspan="2">
                    <div class="col-md-12">
                        <!-- <a href=".../orders.php" class="btn btn-sm btn-danger col-md-12">Cancel</a> -->
                        <a href="orders.php" class="btn btn-sm btn-danger col-md-12">Cancel</a>
                    </div>
                </th>
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function()
        {
            var grossTotal = $('#grossTotal').val();
                var disPer = $('#disPer').val();
                var disValue = grossTotal * disPer / 100;
                var total = grossTotal - disValue;
                var gst = total * 9 / 100;
                var billAmount = total + gst + gst;
                $('#discount').html(disValue); 
                $('#cgst').html(gst); 
                $('#sgst').html(gst); 
                $('#billAmt').html(billAmount.toFixed(2));


            $('#disPer').keyup(function(){
                var grossTotal = $('#grossTotal').val();
                var disPer = $('#disPer').val();
                var disValue = grossTotal * disPer / 100;
                var total = grossTotal - disValue;
                var gst = total * 9 / 100;
                 billAmount = total + gst + gst;
                $('#discount').html(disValue.toFixed(2)); 
                $('#cgst').html(gst.toFixed(2)); 
                $('#sgst').html(gst.toFixed(2)); 
                $('#billAmt').html(billAmount.toFixed(2));
            });

            $('#advanceType').keyup(function()
            {
                var advance = $('#advanceType').val();
                var remain= (billAmount)-(advance);
                $('#remainType').val(remain.toFixed(2));
                
            });
            // $('#addBill').click(function()
            // {
            //     alert('hi');
            // });

            

        });
        document.getElementById("hides").style.display= "none";
        document.getElementById("hides1").style.display= "none";
        document.getElementById("hides2").style.display= "none";
        function user1()
        {
            //alert("hii");
            var wingname = document.getElementById('paymentType').value;
            if(wingname=='Advance')
            {
                document.getElementById("hides").style.display= "";
                document.getElementById("hides1").style.display= "";
                document.getElementById("hides2").style.display= "";
                
            }
            else
            {
                if(wingname=='Now')
                {
                
                    document.getElementById("hides2").style.display= "";
                }
                else
                {
                    document.getElementById("hides2").style.display= "none";
                    document.getElementById("hides").style.display= "none";
                    document.getElementById("hides1").style.display= "none";
                }   
                return;
            }
            return;
        }

    </script>