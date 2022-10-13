<?php
require_once('../connect.php');

$orderId = $_POST['orderId'];
$customerId = $_POST['customerId'];
$branchId = $_POST['branchId'];
$pickupDate = $_POST['pickupDate'];
$delivaryType = $_POST['delivaryType'];
$grossTotal = $_POST['grossTotal'];
$disPer = $_POST['disPer'];
$discount = $_POST['discount'];
$gstAmount = $_POST['gstAmount']*2;
$billAmount = $_POST['billAmount'];
$paymentType = $_POST['paymentType'];
$paymentMode = $_POST['paymentMode'];
$advanceType = $_POST['advanceType'];
$remainType = $_POST['remainType'];

    $q="INSERT INTO `couterorder`(`coId`, `cid`,`bid`, `pickupDate`, `deleveryType`, `grossAmount`, `discountPer`, `discount`, `gst`, `totAmount`, `paymentType`,`paymentMode`,`advanceType`,`remainType`,`orderType`)
    VALUES ('$orderId','$customerId','$branchId','$pickupDate','$delivaryType','$grossTotal','$disPer','$discount','$gstAmount','$billAmount','$paymentType','$paymentMode','$advanceType','$remainType','Counter')";
    $confirm=mysqli_query($conn,$q);
    if($confirm)
    {
        // get temp product
        $qry1="SELECT * FROM `tempproduct`;";
		$confirm1 = mysqli_query($conn,$qry1);
		while($product = mysqli_fetch_array($confirm1))
		{
            // insert temp product in permant table
            $q2="INSERT INTO `counterproduct`(`coId`, `unit`, `pid`, `pqty`, `weight`, `rate`, `amount`, `remark`) 
            VALUES ('$orderId', '$product[1]', '$product[2]', '$product[3]', '$product[4]', '$product[5]', '$product[6]', '$product[7]')";
            $cfm2=mysqli_query($conn,$q2);

            // fetch tpid from permanat table
            $q3="SELECT `tpid` FROM `counterproduct` ORDER BY `tpid` DESC LIMIT 1;";
            $cfm3=mysqli_query($conn,$q3);
            $row3=mysqli_fetch_array($cfm3);
            //echo $row3[0];

            $qry4="SELECT * FROM `tempaddon` WHERE `tpid`='$product[0]';";
            $cfm4 = mysqli_query($conn,$qry4);
            while($addon = mysqli_fetch_array($cfm4))
            {
                $q5="INSERT INTO `counteraddon`(`coId`, `tpid`, `pid`, `addon`, `arate`, `qty`, `total`) VALUES ('$orderId','$row3[0]','$addon[2]','$addon[3]','$addon[4]','$addon[5]','$addon[6]')";
                $cfm5 = mysqli_query($conn, $q5);
            }
        }

        $qry6="TRUNCATE `tempaddon`;";
        $cfm6 = mysqli_query($conn,$qry6);
        $qry7="TRUNCATE `tempproduct`;";
        $cfm7 = mysqli_query($conn,$qry7);

        // $qry8="SELECT `email` FROM `customer` WHERE `cid` = '$customerId';";
        // $exc=mysqli_query($conn,$qry8);
        // while($row=mysqli_fetch_array($exc))
        // {
        //     $to=$row['email'];
        //     $subject = 'The VFF GYM RENEWAL PLAN';
        //     $msg = "Hello Your Laundry Order @UNIT OF VFF-GROUP is '$billAmount'";         
        
        // include('../smtp/PHPMailerAutoload.php');
        // $html='Msg';
        
        //     $mail = new PHPMailer(); 
        //     $mail->SMTPDebug  = 3;
        //     $mail->IsSMTP(); 
        //     $mail->SMTPAuth = true; 
        //     $mail->SMTPSecure = 'tls'; 
        //     $mail->Host = "mail.vff-group.com";
        //     $mail->Port = 587; 
        //     $mail->IsHTML(true);
        //     $mail->CharSet = 'UTF-8';
        //     $mail->Username = "information@vff-group.com";
        //     $mail->Password = "vff123@";
        //     $mail->SetFrom("information@vff-group.com");
        //     $mail->Subject = $subject;
        //     $mail->Body =$msg;
        //     $mail->AddAddress($to);
        //     $mail->SMTPOptions=array('ssl'=>array(
        //         'verify_peer'=>false,
        //         'verify_peer_name'=>false,
        //         'allow_self_signed'=>false
        //     ));
        //     if(!$mail->Send()){
        //         echo $mail->ErrorInfo;
        //     }else{
        //         return 'Sent';
        //     }
        //     echo $mail;
        // }

        
        
        
                                

        // $subject = "About Order Bill";
		// $message = "<p>Your order id id '$orderId' and the bill Amount is '$billAmount'.</p>";

        // //  Put here from mail to pass the mail from this mail id
		// $headers = "From: akashjogani93@gmail.com";
		// $headers .= "MIME-Version: 1.0"."\r\n";
		// $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
		// if (mail($email[0], $subject, $message, $headers)) {
        //     echo "Order Placed Successfully";
		// } else {
        //     echo "Order Placed Successfully. \n But Mail has been not sent.";
		// }
    }
    

?>