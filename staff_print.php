            
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- icon -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<html>
  <style>
.row{
  display:flex;
}
input[type=text], [type=file] {
  margin-left:15px;
  padding-left:30px;
box-sizing: border-box;
border: none;
border-bottom: 1px solid black;
border-radius:0px;
}



      .form-group{
          display:inline-block;
          font-size:17px;
      }
      .table{
          width:93%;
         
          margin-left:30px;
      }
    
      th{
         
          font-size:17px;
      }
      td{
       
          margin-left:5px;
          font-size:17px;
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

      }

      .form-group {
  margin-bottom: 0px;
}.group-form{
  padding:0px;
}

      </style>
  <body>
      <script>
          $(document).ready(function() {
          print();
          });
      </script>
                
          <div class="card container" >
                <?php 
                      include("connect.php");
              
                      if(isset($_GET['view']))
                      { 
                          $id=$_GET['view'];
                          //echo $id;

                      }		
                      $qry="SELECT * FROM staff WHERE id='$id'";
                      $exc=mysqli_query($conn,$qry);
                      while($row=mysqli_fetch_array($exc))
                      {

                              $id=$row['id'];
                              $date=$row['date'];
                              $f=$row['fname'];
                              $m=$row['mname'];
                              $l=$row['lname'];
                              $full=$f." ".$m." ".$l;  
                              $gen=$row['gen'];
                              $adds=$row['adds'];
                              $city=$row['city'];
                              $state=$row['state'];
                              $pin = $row['pin'];
                              $mobile=$row['mobile'];
                              $email=$row['email'];
                              $des=$row['des'];
                              $upl1=$row['upl1'];
                              $branch=$row['branch'];
                      }
                              $query="SELECT * FROM `branch` WHERE `bname`='$branch'";
                              $exc=mysqli_query($conn,$query);
                              while($row=mysqli_fetch_array($exc))
                              {
                                  $adds1=$row['adds'];
                                  $gst=$row['gst'];
                                  $mobile1=$row['mobile'];
                                  $email1=$row['email'];
                              }
                  ?>
                <div class="card-body">            
                  <div class="panel-heading">                       
                        <div class="panel-title">     
                        <img src="assets/image/log.jpg">
                          <center><P style="float:right;"><b>Date:- <?php echo $date; ?></b></p><h5 style="margin-top:20px;" >UNIT OF VFF GROUP</h5> </center>
                          <center><h4 style="margin-top:20px; margin-right:130px;" >VFD LAUNDRY</h4> </center>
                          
                          <center>
                              <div style="margin-right:70px;">
                                  <p></p> </center>
                              </div> 
                              
                             
                      <hr>
                        </div>
                  </div>
                  <form action="member_add.php" method="post" enctype="multipart/form-data">

                  
                  <center><h4>Personal Information</h4></center><hr>
                  <div class="row mt-2">
                      <div class="group col-md-6">
                          <label class="" for="company_name">Employee Id:-</label>
                          <input style="width:75%;" type="text"  value="<?php echo $id; ?>" name="id" id="id">
                      </div>

                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">Name:-</label>
                          <input style="width:75%;" type="text"  value="<?php echo $full; ?>" name="fname" id="fname" />
                      </div>       
                  </div>

                  <div class="row mt-2">  
                      <div class="group-form col-md-6" style="margin-left:13px;">
                          <label class="form_label" for="company_name">Gender:-</label>             
                          <input style="width:75%;" type="text" value="<?php echo $gen; ?>" name="lname" id="lname" />
                      </div> 
                  </div></br>


                  <center><h4>Contact Information</h4></center><hr>
                  <div class="row mt-2">
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">Address:-</label>
                          <input style="width:80%;" type="text" value="<?php echo $adds; ?>" name="adds" id="adds">
                      </div>
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">City:-</label>
                          <input style="width:80%;"type="text" value="<?php echo $city; ?>" name="city" id="city" >
                      </div>
                  </div>
                  <div class="row mt-2">
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">State:-</label>
                          <input style="width:84%;" type="text" value="<?php echo $state; ?>" name="state" id="state" />
                      </div>
                  
              
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">Zip Code:-</label>
                          <input style="width:72%;" type="text" value="<?php echo $pin; ?>" name="pin" id="pin"/>
                      </div> 
                  </div>

                  <div class="row mt-2">
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">Mobile Number:-</label>
                          <input style="width:67%;" type="text" value="<?php echo $mobile; ?>" name="mobile" id="mobile" >
                      </div>
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">Email:-</label>
                          <input style="width:78%;" type="text"  value="<?php echo $email; ?>" name="email" id="email"/>
                      </div>
                  </div>
      
                  <div class="row mt-2">
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name"> Document uploaded:-</label>
                          <input style="width:50%;" type="text" name="doc"  value="<?php if($upl=='')
                          {
                              //echo 'NO';
                          }else{
                              //echo 'YES';
                          }
                          ?>" id="doc" accept="image/x-png,image/jpg,image/jpeg" 
                         />
                          
                      </div>
                  </div>
                  </br>
                  <center><h4>More Information</h4></center><hr>
                  <div class="row mt-2">
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">Branch</label>
                          <input style="width:70%;" type="text" id="weeks" value="<?php echo $branch; ?>" class="ches" value="" name="weeks">

                      </div>
                  </div><br><br>

                  <div class="row mt-2" style="float:right;">
                      <div class="group-form col-md-6">
                          <label class="form_label" for="company_name">Signature</label>
                          <input  type="text" id="weeks" class="ches" name="weeks">
                      </div><br>
                  </div>
                  
              </div>
      </form>
      <!--<form>
          <div class="card container" >
              <div class="card-body">            
                  <div class="panel-heading">                       
                        <div class="panel-title">     
                       <center><h4 style="color:red;">GYM MEMBERS TERMS AND CONDITIONS</h4></center>
                       <hr>
                       <br>
                  <ul>
                      <li>This is dependent on you maintaining payments of your monthly direct debit. If any monthly direct debit payment is not received on the due date for payment, then your membership will (except in exceptional circumstances and at our sole discretion) be automatically suspended until all due payments have been brought up to date.</li>
                      <li>You will be entitled to all the rights and privileges exercisable for the Type of Membership chosen. FEES AND CHARGES</li>
                      <li>VELVET ROYAL GYM members must provide all correct documents at the time of registration.</li>
                      <li>You will be provided with your personal non-transferable membership number that you will be requested to show at the start of your activity session.</li>
                      <li>Membership fees do not cover the cost of lockers. Any property stored in lockers is stored at your own risk. We regret that we cannot accept liability for any loss or damage that may occur to items stored in lockers.</li>
                      <li>On joining, all members are offered an induction to instruct you on the use of the equipment. We strongly recommend that this is undertaken. If you are subsequently unsure how to use any equipment, please ask VELVET FIT INDIA ROYAL GYM Trainer.</li>
                      <li>You must inform us if you have sustained a personal injury elsewhere or have developed a medical condition that may have consequences for training.</li>
                      <li>Suitable gym clothing and <b>clean shoes </b>is compulsory for each and every member of VELVET FIT INDIA ROYAL GYM ( Denim is not permitted ).</li>
                      <li>Equipment must be treated with respect. Please refrain from dropping weights and they should be replaced after use.</li>
                      <li>Machines and equipment must be wiped down after use, left clean and dry and replaced in the correct area.</li>
                      <li>You may not use the gym or participate in a class when under the influence of alcohol, drugs or any medication that may affect your safety.</li>
                      <li>Only VELVET FIT INDIA ROYAL GYM <b> PERSONAL TRAINER</b> are permitted to train members in Our Gym.</li>
                      <li>You will be given a free key fob with your membership. Should you require a replacement, a fee will be charged.</li>
                      <li>Membership does not guarantee the availability of a parking space. Parking spaces are available on a first come first served basis. Parking is limited to a maximum of 3 hours.</li>
                      <li>Members must keep their personal details up to date at all times. Any changes should be made via the members area in our booking system.</li>
                      <li>Smoking (including e-cigarettes) is not permitted.</li>
                      <li> Failure to adhere to these rules may result in the termination of your membership.</li>
                      <li>You are required to abide by our policy on the use of cameras, video and mobile phones.</li>
                      <li>The Joining Fee / Initial Payment is due from you to us, is payable immediately and is not refundable other than due to cancellation under the Principal Terms above or in the event of breach or negligence by us.</li>
                      <li>Only Velvet Royal Gym related persons are allowed at gym premises.</li>
                      <li>Any kind of illegal activities done by any member strict action will taken on him/her And there membership also cancelled.</li>
                      <br>
                      <h5>Annual / 12 Month Memberships</h5>
                      <li>If you pay for an Annual Membership ie 12 months membership fees in advance or sign up to a 12 month Direct debit membership, your membership will run for the 12 month period covered by the payment without any refund should you choose not to use your membership in that 12 month period. No refunds will be offered for any part of the 12 months not used. This applies to Annual and Off-Peak Annual memberships.</li>
                    <br>
                      <h5>OFFER : VELVET ROYAL GYM members can use there earned reward points at VEL-VET WASH  and VFF SPORTS BRANDS</h5>
                      <br><br>
                      <h5 style="color:red;">VELVET ROYAL GYM MEMBER SELF DECLARATION</h5>
                      <li>I read and agreed above all terms and conditions of<b> VELVET ROYAL GYM</b> </li>
                      <br><br><br><br><br>
                  </ul>
                  
                  </div>
              
                  </div>
               </div> 
          </div>
      </form>-->

      </body>
  
</html>

