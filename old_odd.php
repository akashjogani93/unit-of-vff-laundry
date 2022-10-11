<?php include("sidebar.php");
include('connect.php');
 ?>

 
<style>
    
    .form-controls {
        
        width: 100%;
        font-size: 1rem;
        font-weight: 400;
        color: #495057;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        
    }
    </style>
<script>
$(document).ready(function(){
	$(".wish-icon i").click(function(){
		$(this).toggleClass("fa-heart fa-heart-o");
	});
});	
</script>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
             <h2 class="" style=" font-weight: 600">Add And Pickup Orders </h2>
        </div>
        <hr style="margin: 0px;">   
    </div>
</div>
<main class="page-content">
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <center><h4>Personal Information</h4></center><hr></br>

            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Order Id</label>                    
                    <input type="text" readonly  class="form-control form-control-sm" name="id" id="id" placeholder=" Id">
                </div>

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">First Name</label>
                    <input type="text" class="form-control form-control-sm" required name="fname" id="fname" placeholder="First Name"/>
                </div>
                
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Last Name</label>
                    <input type="text" class="form-control form-control-sm" required name="mname" id="mname" placeholder="Middle Name"/>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="email" class="form-control form-control-sm" required name="email" id="email" placeholder="Add email"/>
                </div>
                
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Mobile Number</label>
                    <input type="text" required class="form-control form-control-sm" name="mobile" id="mobile" placeholder="Add mobile">
                </div>

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Zip Code</label>
                    <input type="text" class="form-control form-control-sm" required name="pin" id="pin" placeholder="Pin Code"/>
                </div>

              
            </div><br>

            <center><h4>Pickup Address</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Address </label>
                    <input type="text" class="form-control form-control-sm" required name="pin" id="pin" placeholder="Add Address "/>
                </div>

                

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">City</label>
                    <input type="text" class="form-control form-control-sm" required name="pin" id="pin" placeholder="Add city"/>
                </div>
            

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name"> State</label>
                    <input type="text" required class="form-control form-control-sm" name="mobile" id="mobile" placeholder="Add State">
                </div>
            </div><br>

            <center><h4>Delivery Address</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Address </label>
                    <input type="text" class="form-control form-control-sm" required name="pin" id="pin" placeholder="Add Address "/>
                </div>

              

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">City</label>
                    <input type="text" class="form-control form-control-sm" required name="pin" id="pin" placeholder="Add city"/>
                </div>
        

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name"> State</label>
                    <input type="text" required class="form-control form-control-sm" name="mobile" id="mobile" placeholder="Add State">
                </div>
            </div><br>

           
            <center><h4> Other Information</h4></center><hr></br>
            <div class="row mt-2">

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Branch</label>
                    <select class="form-control form-control-sm" Readonly name="branch" id="branch">
                    <option value="">Select Branch</option> 
                            
                    </select>
                </div>

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Pickup Date</label>
                    <input type="date" required class="form-control form-control-sm" name="mobile" id="mobile" placeholder="Add mobile">
                </div>

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Pickup Time</label>
                    <input type="time" class="form-control form-control-sm" required name="email" id="email" placeholder="Add email"/>
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Date</label>
                    <input type="date" required class="form-control form-control-sm" name="mobile" id="mobile" placeholder="Add mobile">
                </div>

                
                    <div class="group-form col-md-4">
                        <label class="form_label" for="company_name">Delivery Time</label>
                        <input type="time" class="form-control form-control-sm" required name="email" id="email" placeholder="Add email"/>
                    </div>

                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Type</label>
                    <select class="form-controls form-control-sm" required name="pay" id="pay">
                        <option value="">Dilevery type</option>
                        <option>By Walkin</option>
                        <option>By Delivery Boy</option>
                    </select>
                </div>
            </div><br><br>
        
            <center><h4>Choose Service</h4></center><hr></br>
            <center><div class="row mt-2">
                <div class="group-form col-md-3" >
                    <label class="form_label" for="company_name">Select Service</label>
                    <select class="form-controls form-control-sm mul-select" id="service" name="service">
                            <option value="">Select Services</option> 
                                <?php
                                    $query="SELECT DISTINCT `title` FROM `services` ORDER BY `sid` ASC";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                {?>
                                    <option><?php echo $loca['title']; ?></option>
                                <?php   
                                }
                            ?> 
                    </select>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" style="margin-right:150px" for="company_name">Select Kg/Unit</label>
                    <select class="form-controls form-control-sm" name="type" id="type" onchange="cate1()">
                        <option value="">Select Type</option>
                        <option>Kg</option>
                        <option>Unit</option>    
                    </select>
                </div>
            </div></center><br><br>            
            <center><h4>Products</h4></center><hr>            
            <div class="table-responsive" style="overflow-y:scroll; height: 380px; width:80% margin-left: 100px;">
                <table id="example"  style="width:100%">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="mytable">
                    </tbody>
                </table>
    
                
            <div class="row mt-2">
                <div class="group-form-btn col-md-2">
                    <button type="submit" class="btns btn-sm btn-info col-md-12">Submit</button>         
                </div>
            
            </div>

            
            
        </form>
        <br><br>
        <br><br>
        <br><br>
                    
<!-- page-content" -->

</div>
</main>
<script>
    var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>


<script>
    function cate1()
    {
        //alert("hi");
        var typ = document.getElementById('type').value;
        var ser = $("#service").val();
        alert(ser);
        //alert(typ)
        $.ajax({
            url: 'products.php',
            type: "POST",
            dataType:'json',
            data:  {
                typ: typ,
                ser: ser

            }
            , success:function(data) {
                alert(data)
                $("#mytable").html(data);
            }

        });

    }
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

echo $sql3 = "TRUNCATE TABLE orderdel";
if (!mysqli_query($conn, $sql3)) {
    die('Error: ' . mysqli_error($conn));
}