<?php include("sidebar.php");
$id=$_SESSION["id"];
$_SESSION['bname']=$branch;
$_SESSION['bid']=$bid;
// echo $branch;
// echo $bid;
?>

<style>
.cc {
    margin-bottom: 10px;
}
body{
    background-color: #FFFFFF;
}
</style>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
            <h2 class="" style=" font-weight: 600">Counter Order</h2>
        </div>
        <hr style="margin: 0px;">

    </div>
</div>
<?php
                    // $id = $idd = 0;
                    // $sql = "SELECT max(id) FROM cust_detail";
                    // $retval = mysqli_query($conn, $sql );
                    // $row = mysqli_fetch_assoc($retval);
                    // $id = $row['max(id)']+1;
            
                    $sql = "SELECT MAX(`coId`) FROM `couterorder`;";
                    $retval = mysqli_query($conn, $sql );
                    $row = mysqli_fetch_assoc($retval);
                    $idd = $row['MAX(`coId`)']+1;
                ?>

<main class="page-content">
    <script>
        $(document).ready(function() {
        $('.add_more').click(function(e) {
            e.preventDefault();
            $('#show').after(`<tr style="background-color: #ebf9f7;" class="addonRow">
                    <td colspan="2">
                    <label class="form_label" for="company_name">Select Addon</label>
                    <select class="form-controls form-control-sm addonName" required name="addn[]" id="addn[]" onchange="addAddon(this.id)">>
                        <option value="">Select Addon</option>
                        <?php
                            $query="SELECT DISTINCT `addon` FROM `addon` ORDER BY `id` ASC";
                            $confirm=mysqli_query($conn,$query);
                            while($loca=mysqli_fetch_array($confirm)){?>
                        <option><?php echo $loca['addon']; ?></option>
                        <?php } ?>
                    </select>
                    </td>
                    <td> <label class="form_label" for="company_name">Product Rate</label>
                    <input type="text" class="form-control form-control-sm addonPrice" readonly name="price[]" id="price" /></td>
                    <td> 
                        <label class="form_label" for="company_name">Add Qty</label>
                    <input type="text" class="form-control form-control-sm addonQty" require name="qtyy[]" id="qtyy" />
                    </td>
                    <td>
                    <label class="form_label" for="company_name">Total</label>
                    <input type="text" class="form-control form-control-sm addonTot" readonly name="tot[]" id="tot" />
                    </td>
                    <td>
                    <br/>
                     <button class="btn btn-sm btn-danger form-control-sm remove">Remove</button>
                    </td>
                </tr>`);
        });

        $(document).on('click', '.remove', function(e) {
              e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });

        $(document).on('change', '.addonName', function(e) {
            e.preventDefault();
            //alert($(this).parent().parent().find('input'));
            let addn = $(this).val();
            let addonRate = $(this).parent().parent().find('.addonPrice');
            let addonQty = $(this).parent().parent().find('.addonQty');
            let addonTot = $(this).parent().parent().find('.addonTot');
            $.ajax({
                url: 'ajaxrequest/getAddonRate.php',
                type: "POST",
                dataType: 'json',
                data: {
                    addn : addn,
                },
                success: function(data) {
                    console.log(data);
                    $(addonRate).val(data);
                }
            });
        });

        $(document).on('click', '.addonName', function(e) {
            var product = $('#product').val();
            var orderUnit = $('#orderUnit').val();
            if(product == '')
            {
                alert("Select Product");
                exit();
            }else if(orderUnit == '')
            {
                alert("Select orderUnit");
                exit();
            }
        });

        $(document).on('keyup', '.addonQty', function(e) {
            var product = $('#product').val();
            var orderUnit = $('#orderUnit').val();
            if(product == '')
            {
                alert("Select Product");
                exit();
            }else if(orderUnit == '')
            {
                alert("Select orderUnit");
                exit();
            }else{
                let addonQty = $(this).val();
                let addonRate = $(this).parent().parent().find('.addonPrice').val();
                let addonTot = $(this).parent().parent().find('.addonTot');
                $(addonTot).val((addonQty * addonRate).toFixed(0));
            }
        });

        //ajax insert
        $('#add_form').submit(function(e) {
            e.preventDefault();
            //$('#order-ajax1').val('Adding...');
            var data1 = $(this).serialize();
            alert(data1);
            $.ajax({
                type: "POST",
                url: 'addon_ajax.php',
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                }
            });
        });

    });
    </script>


    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <center>
                <h4>Order Summary</h4>
            </center>
            <hr />
            <div style="background-color: #ebf9f7; padding:20px; border:1px solid #ebf9f7;">
                <div class="row mt-2">
                    <div class="group-form col-md-3" >
                        <label class="form_label" for="company_name">Order Id</label>
                        <input type="text" readonly style="background-color: white;" class="form-control form-control-sm" name="id" id="orderId"
                            value="<?php echo $idd; ?>" placeholder=" Id">
                    </div>

                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Select Customer</label>
                        <select class="form-controls form-control-sm" style="border: 1px solid black;" required name="customer" id="customer"
                            onchange="custo1()">
                            <option value="">Select Cutomer</option>
                            <?php
                                $query="SELECT DISTINCT `cid`,`full` FROM `customer` ORDER BY `cid` ASC";
                                $confirm=mysqli_query($conn,$query);
                                while($loca=mysqli_fetch_array($confirm)){?>
                            <option value="<?php echo $loca['cid']; ?>"><?php echo $loca['full']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="group-form col-md-6">
                        <label class="form_label" for="company_name">Cust Name</label>
                        <input type="text" style="background-color: white;" class="form-control form-control-sm" readonly name="cust" id="cust"
                            placeholder="Customer Name" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Mobile</label>
                        <input type="text" style="background-color: white;" class="form-control form-control-sm" readonly name="mob" id="mob"
                            placeholder="Add mobile" />
                    </div>

                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Address</label>
                        <input type="text" readonly style="background-color: white;" class="form-control form-control-sm" name="adds" id="adds"
                            placeholder="Add Address">
                    </div>

                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">H.no</label>
                        <input type="text" style="background-color: white;" class="form-control form-control-sm" readonly name="hno" id="hno"
                            placeholder="Hno" />
                    </div>
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Zipcode</label>
                        <input type="text" style="background-color: white;" class="form-control form-control-sm" readonly name="zip" id="zip"
                            placeholder="zipcode" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">Email</label>
                        <input type="text" style="background-color: white;" class="form-control form-control-sm" readonly name="email" id="email"
                            placeholder="Add Email" />
                    </div>

                    <div class="group-form col-md-6">
                        <label class="form_label" for="company_name">Delivery Address</label>
                        <input type="text" style="background-color: white;" readonly class="form-control form-control-sm" name="adds1" id="adds1"
                            placeholder="Delivery Address">
                    </div>

                    <div class="group-form col-md-3">
                        <label class="form_label" for="company_name">GSTN</label>
                        <input type="text" style="background-color: white;" class="form-control form-control-sm" readonly name="gstn" id="gstn"
                            placeholder="GSTN" />
                    </div>
                </div><br>
            </div>
            <hr>
            <center>
                <h4>Pickup Date And Delivery Date</h4>
            </center>
            <hr>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Pickup Date</label>
                    <input type="Date" class="form-control form-control-sm" required name="from" id="pickupDate" />
                    <script>
                    $(document).ready(function() {
                        var yourDateValue = new Date();
                        var formattedDate = yourDateValue.toISOString().substr(0, 10)
                        $('#pickupDate').val(formattedDate);
                    });
                    </script>
                </div>
                <!--<div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Date</label>
                    <input type="Date" class="form-control form-control-sm" required name="date1" id="date1" />
                </div>-->
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Type</label>
                    <select class="form-controls form-control-sm" required name="type" id="delivaryType">
                        <option value="">Select Type</option>
                        <option>By Counter</option>
                        <option>Delivery Boy</option>
                    </select>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Select Branch</label>
                    <!-- <input type="text" class="form-control form-control-sm" required name="branch" id="branch" /> -->
                    <select class="form-controls form-control-sm" required name="branch" id="branch">
                        <option value="<?php echo $bid; ?>"><?php echo $branch; ?></option>
                        
                    </select>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <center>
            <h4>Add Order</h4>
        </center>

        <table class="table table-bordered">
            <thead>
            </thead>
            <tbody id="show">
                <tr style="background-color: #ebf9f7;">
                    <th colspan="1">
                        <label class="form_label" for="company_name">KG/UNIT</label>
                        <select class="form-controls form-control-sm" required name="kg" id="orderUnit"
                            onchange="kgWiseRate()">
                            <option value="">Select..</option>
                            <option value="unit">unit</option>
                            <option value="kg">Kg</option>
                        </select>
                    </th>
                    <th colspan="2">
                        <label class="form_label" for="company_name">Select Service</label>
                        <select class="form-controls form-control-sm" required name="service" id="service"
                            onchange="service1()">
                            <option value="">Select Services</option>
                            <?php
                       $query="SELECT DISTINCT `title` FROM `services` ORDER BY `sid` ASC";
                       $confirm=mysqli_query($conn,$query); 
                       while($loca=mysqli_fetch_array($confirm))
                    {?>
                            <option><?php echo $loca['title']; ?></option>
                            <?php } ?>
                        </select>
                    </th>
                    <th colspan="3"><br />
                        <h5 style="display: none;" id="kgrateshow">Service Rate : <spam id="kgRateShow"></spam> per KG
                        </h5>
                    </th>

                </tr>


                <tr style="background-color: #ebf9f7;">
                    <th colspan="2">
                        <label class="form_label" for="company_name">Select Products</label>
                        <select class="form-controls form-control-sm" required name="product" id="product"
                            onchange="product1()">
                            <option value="">Select Products</option>
                        </select>
                    </th>
                    <th>
                        <div>
                            <label class="form_label" for="company_name">Product Ouantity</label>
                            <input type="text" class="form-control form-control-sm" name="productQuantity"
                                id="productQuantity" onkeyup="defineRate()" />
                        </div>
                    </th>
                    <th>
                        <productRate>
                            <label class="form_label" for="company_name">Product Rate</label>
                            <input type="text" class="form-control form-control-sm" readonly name="price1"
                                id="productRate" />
                        </productRate>

                        <productWeight style="display: none;">
                            <label class="form_label" for="company_name">Total Weight In Gram</label>
                            <input type="text" value="0" class="form-control form-control-sm" name="price1" id="productWeight"
                                onkeyup="calKgRate()" />
                        </productWeight>
                    </th>
                    <th colspan="2">
                        <label class="form_label" for="company_name">Amount</label>
                        <input type="text" class="form-control form-control-sm" readonly name="tot"
                            id="productAmount" />
                    </th>
                </tr>

                <tr>
                    <th>
                        <button class="btn btn-sm btn-primary add_more">Add Addons</button>
                    </th>
                    <th colspan="5">
                        <h5>Add Addon</h5>
                    </th>
                </tr>

                <tr style="background-color: #ebf9f7;" class="addonRow" id="addonRow">
                    <td colspan="2">
                        <label class="form_label" for="company_name">Select Addon</label>
                        <select class="form-controls form-control-sm addonName" required name="addn[]">
                            <option value="">Select Addon</option>
                            <?php
                            $query="SELECT DISTINCT `addon` FROM `addon` ORDER BY `id` ASC";
                            $confirm=mysqli_query($conn,$query);
                            while($loca=mysqli_fetch_array($confirm)){?>
                            <option><?php echo $loca['addon']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td> <label class="form_label" for="company_name">Addon Rate</label>
                        <input type="text" class="form-control form-control-sm addonPrice" readonly name="price[]" id="price[]" />
                    </td>
                    <td>
                        <label class="form_label" for="company_name">Add Qty</label>
                        <input type="text" class="form-control form-control-sm addonQty" require name="qtyy[]" id="qtyy[]" />
                    </td>
                    <td>
                        <label class="form_label" for="company_name">Total</label>
                        <input type="text" class="form-control form-control-sm addonTot" readonly name="tot[]" id="tot[]" />
                    </td>
                    <td>
                        <br />
                        <button class="btn btn-sm btn-danger form-control-sm remove">Remove</button>
                    </td>
                </tr>

            </tbody>
            <tfoot>
                <tr style="background-color: #ebf9f7;">
                    <th colspan="2">
                        <label class="form_label" for="company_name">Remark</label>
                        <input type="text" class="form-control form-control-sm" name="remark" id="remark" />
                    </th>
                    <th style="width: 20%;">
                        <label class="form_label" for="company_name"></label>
                        <button type="button" class="btn btn-sm btn-info col-md-12 order-ajax1" onclick="addItem()">Add Item</button>
                    </th>
                    <th style="width: 20%;"><label class="form_label" for="company_name"></label>
                        <button type="button" name="" class="btn btn-sm btn-danger col-md-12" onclick="clearItem()">clear</button>
                    </th>
                    <th colspan="5"></th>
                </tr>
            </tfoot>
        </table>

        <div class="table-responsive" style="width:100%">
            <div class="show-message">
            </div>

            <center>
                <h4>View Order</h4>
            </center>
            <div id="billTable">

            </div>
        </div>
</main>

<?php include("../footer.php"); ?>
<script>
$(document).ready(function() {
    getdata();
    $('.order-ajax').click(function(e) {
        e.preventDefault();
        var kg = $('#kg').val();
        var ser = $('#service').val();
        var pro = $('#product').val();
        var price = $('#price1').val();
        var qty = $('#qty').val();
        var tot = $('#tot1').val();
        var qot = $('#qot').val();
        //console.log(qot);

        if (kg != '' & ser != '' & pro != '' & qty != '') {
            $.ajax({
                type: "POST",
                url: "or_ad.php",
                data: {
                    'checking_add': true,
                    'kg': kg,
                    'ser': ser,
                    'pro': pro,
                    'price': price,
                    'qty': qty,
                    'tot': tot,
                    'qot': qot,
                },
                success: function(response) {
                    console.log(response);
                    $('.show-message').append('\
                            <div class="alert alert-info alert-dismissible fade show" role="alert">\
                            <strong>Hey! </strong> Record Added\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                <span aria-hidden="true">&times;</span>\
                            </button>\
                            </div>\ ');

                    $('.order-data').html("");
                    getdata();
                    $('#kg').val("");
                    $('#service').val("");
                    $('#product').val("");
                    $('#price1').val("");
                    $('#qty').val("");
                    $('#tot1').val("");





                }
            });
        } else {
            //console.log("Enter All Feild!..")error-message
            $('.error-message').append('\
                            <div class="alert alert-info alert-dismissible fade show" role="alert">\
                            <strong>Hey! </strong> Enter All Feild!..\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                <span aria-hidden="true">&times;</span>\
                            </button>\
                            </div>\ ');

        }

    });
});

function getdata() {
    $.ajax({
        type: "GET",
        url: "order_fetch.php",
        success: function(response) {
            //console.log(response)
            $.each(response, function(key, value) {
                console.log(value['product']);
                $('.order-data').append('<tr>' +
                    '<td>' + value['id'] + '</td>\
                                    <td>' + value['kg'] + '</td>\
                                    <td>' + value['service'] + '</td>\
                                    <td>' + value['product'] + '</td>\
                                    <td>' + value['rate'] + '</td>\
                                    <td>' + value['qty'] + '</td>\
                                    <td>' + value['tot'] + '</td>\
                                    <td>' + value['tot'] + '</td>\
                                        </tr>');

            });

        }
    });
}
</script>

<script>
$(document).ready(function() {
    $('#billTable').load('ajaxrequest/billData.php');
    $('#example').DataTable({
        "ordering": false
    });

});
</script>
<script>
function custo1() {
    //var wingname = document.getElementById('customer').value;
    var wingname = $('#customer').val();
    //alert(wingname);
    console.log($.ajax({
        url: 'ajaxrequest/getCustomer.php',
        type: "POST",
        dataType: 'json',
        data: {
            wingname: wingname,
        },
        success: function(data) {
            console.log(data);
            $("#cust").val(data[0].full);
            $("#mob").val(data[0].mobile);
            $("#adds").val(data[0].adds);
            $("#hno").val(data[0].hno);
            $("#zip").val(data[0].zip);
            $("#email").val(data[0].email);
            $("#adds1").val(data[0].adds1);
            $("#gstn").val(data[0].gstn);
            window.g_x2 = data[0].adds;
        }

    }));

}
</script>

<script>
function service1() {
    //alert('hii');
    var service = $('#service').val();
    var orderUnit = $('#orderUnit').val();
    if (orderUnit == "kg") {
        $.ajax({
            url: './ajaxrequest/getKgServiceRate.php',
            type: "POST",
            dataType: 'json',
            data: {
                service: service,
            },
            success: function(data) {
                console.log(data);
                $('#kgrateshow').show();
                $('#kgRateShow').html(data);
            }
        });
    }
    //alert('hello');
    let log = $.ajax({
        url: 'ajaxrequest/getProduct.php',
        type: "POST",
        dataType: 'json',
        data: {
            service: service,
        },
        success: function(data) {
            console.log(data);
            $("#product option").remove();
            var opt = document.createElement("option");
            opt.text = "Select..";
            opt.value = "";
            var x = document.getElementById("product");
            x.add(opt);
            for (var i = 0; i < data.length; i++) {
                var option = document.createElement("option");
                option.text = data[i].productName;
                option.value = data[i].pid;
                x.add(option);
            }
        }
    });
    console.log(log);
}


function product1() {
    var product = $('#product').val();
    var orderUnit = $('#orderUnit').val();
    var ser = $("#service").val();
    if (orderUnit == "unit") {
        let log = $.ajax({
            url: 'ajaxrequest/getProductRate.php',
            type: "POST",
            dataType: 'json',
            data: {
                product: product,
                ser: ser
            },
            success: function(data) {
                $("#productRate").val(data);
            }
        });
        console.log(log);
    }
}

function defineRate() {
    var price = parseFloat($("#productRate").val());
    var qty = parseFloat($("#productQuantity").val());
    $("#productAmount").val((qty * price).toFixed(0));
}

function addItem()
{
    var orderId = $('#orderId').val();

    // get all items
    var orderUnit = $('#orderUnit').val();
    var pid = $('#product').val();
    var productQuantity = $('#productQuantity').val();
    var productWeight = $('#productWeight').val();
    var productRate = $('#productRate').val();
    var productAmount = $('#productAmount').val();
    var remark = $('#remark').val();

    // get all addons
    var vals = [];
    let i = 0;
    $('.addonName').each(function(index, item) {
        vals[i] = [];
        let addonRate = $(item).parent().parent().find('.addonPrice').val();
        let addonQty = $(item).parent().parent().find('.addonQty').val();
        let addonTot = $(item).parent().parent().find('.addonTot').val();
        vals[i].push(pid);
        vals[i].push(item.value);
        vals[i].push(addonRate);
        vals[i].push(addonQty);
        vals[i].push(addonTot);
        i++;
    });

   let log = $.ajax({
        url: 'ajaxrequest/addOrderItem.php',
        type: "POST",
        data: {
            orderUnit : orderUnit,
            pid : pid,
            productQuantity : productQuantity,
            productWeight : productWeight,
            productRate : productRate,
            productAmount : productAmount,
            remark : remark,
            addons : vals
        },
        success: function(data) {
                alert(data);
                $('#product').val('');
                $('#productQuantity').val('');
                $('#productWeight').val('');
                $('#productRate').val('');
                $('#productAmount').val('');
                $('#remark').val('');

                // remove all addons except first one
                $('.remove:not(:first)').parent().parent().remove();
                $('.addonPrice').val('');
                $('.addonQty').val('');
                $('.addonTot').val('');
                $('#orderUnit').val('');
                $('#service').val('');
                $('#kgrateshow').hide();
                $('#billTable').load('ajaxrequest/billData.php');
        }
    });
    console.log(log);
}
//clear button
    function clearItem()
    {
        $('#product').val('');
        $('#productQuantity').val('');
        $('#productWeight').val('');
        $('#productRate').val('');
        $('#productAmount').val('');
        $('#remark').val('');

        // remove all addons except first one
        $('.remove:not(:first)').parent().parent().remove();
        $('.addonPrice').val('');
        $('.addonQty').val('');
        $('.addonTot').val('');
        $('#orderUnit').val('');
        $('#service').val('');
        $('#kgrateshow').hide();
    }
//delete item
    function deleted(dele)
    {
        //alert('hii');
        //var dele = $('#dele').val();
        //alert(dele);
        let log = $.ajax({
            url: 'ajaxrequest/asignorder.php',
            type: "POST",
            data: {
                dele : dele,
            },
            success: function(data) {
                    //alert(data);
                    $('#billTable').load('ajaxrequest/billData.php');
            }
        });
        console.log(log);

    }

// add order codding 
function addOrder() {
    var orderId = $('#orderId').val();
    var customerId = $('#customer').val();
    var branchId = $('#branch').val();
    var pickupDate = $('#pickupDate').val();
    var delivaryType = $('#delivaryType').val();
    var grossTotal = $('#grossTotal').val();
    var discount = $('#discount').html(); 
    var disPer = $('#disPer').val();
    var discount = $('#discount').html(); 
    var gstAmount = $('#cgst').html();
    var billAmount = $('#billAmt').html();
    var paymentType = $('#paymentType').val();
    var paymentMode = $('#paymentMode').val();
    var advanceType = $('#advanceType').val();
    var remainType = $('#remainType').val();

    let log = $.ajax({
        url: 'ajaxrequest/addCounterBilll.php',
        type: "POST",
        data: {
            orderId : orderId,
            customerId : customerId,
            branchId : branchId,
            pickupDate : pickupDate,
            delivaryType : delivaryType,
            grossTotal : grossTotal,
            disPer : disPer,
            discount : discount,
            gstAmount : gstAmount,
            billAmount : billAmount,
            paymentType : paymentType,
            paymentMode : paymentMode,
            advanceType : advanceType,
            remainType : remainType,
        },
        success: function(data) {
                //alert(data);
                $('#billTable').load('ajaxrequest/billData.php');
                //window.location.href = "new_order.php";
                window.location.href="receipt_order.php?view=" + orderId;
                //window.location.href='@Url.Action("EditPartner","MstPartner",new { id = CardCode})';
        }
    });
}



function kgWiseRate() {
    // alert('hiiiiii');
    var orderUnit = $('#orderUnit').val();
    if (orderUnit == "kg") {
        $('productWeight').show();
        $('productRate').hide();
    } else if (orderUnit == "unit") {
        $('productRate').show();
        $('productWeight').hide();
        $('#kgrateshow').hide();
    } else {
        $('#kgrateshow').hide();
        alert("select Unit To Bill");
    }
    console.log(orderUnit);

}

</script>
<script type="text/javascript">
function submitdata() {
    var qot = document.getElementById("qot");
    var kg = document.getElementById("kg");
    alert(qot);
    var course = document.getElementById("course_of_user");

    $.ajax({
        type: 'post',
        url: 'insertdata.php',
        data: {
            user_name: name,
            user_age: age,
            user_course: course
        },
        success: function(response) {
            $('#success__para').html("You data will be saved");
        }
    });

    return false;
}
</script>





<script>
function clearInput() {
    $('#productAmount').val('');
    $('#productWeight').val('');
}

function calKgRate() {
    let kgRate = $('#kgRateShow').html();
    let gramRate = kgRate / 1000;
    let productWeight = $('#productWeight').val();
    let amount = gramRate * productWeight;
    $('#productAmount').val(amount);
}

</script>