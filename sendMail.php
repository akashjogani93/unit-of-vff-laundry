<?php

//  $email = "akashjogani93@gmail.com";
//  $subject = "About Order Bill";
//  $message = "<p>Your order id id  and the bill Amount is .</p>";

// //  Put here from mail to pass the mail from this mail id
//  $headers = "From: akasjogani.06@gmail.com";
//  $headers .= "MIME-Version: 1.0"."\r\n";
//  $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";


//  if (mail("akashjognai93@gmail.com","Success","Send mail from localhost using PHP")) {
//      echo "Order Placed Successfully";
//  } else {
//      echo "Mail has been not sent.";
//  }



        // $email='shindesagar9632@gmail.com';
        // $subject = "About Order Bill";
		// $message = "<p>Your order id id and the bill Amount is .</p>";

        // //  Put here from mail to pass the mail from this mail id
		// $headers = "From: akashjogani93@gmail.com";
		// $headers .= "MIME-Version: 1.0"."\r\n";
		// $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
		// if (mail($email, $subject, $message, $headers)) {
        //     echo "Order Placed Successfully";
		// } else {
        //     echo "Order Placed Successfully. \n But Mail has been not sent.";
		// }
?>

<?php

// $to='akashjogani93@gmail.com';
// $subject = "About Order Bill";
//  $msg = "<p>Your order id id and the bill Amount is.</p>";        
// include('smtp/PHPMailerAutoload.php');
// $html='Msg';

// 	$mail = new PHPMailer(); 
// 	$mail->SMTPDebug  = 3;
// 	$mail->IsSMTP(); 
// 	$mail->SMTPAuth = true; 
// 	$mail->SMTPSecure = 'tls'; 
// 	$mail->Host = "mail.vff-group.com";
// 	$mail->Port = 587; 
// 	$mail->IsHTML(true);
// 	$mail->CharSet = 'UTF-8';
// 	$mail->Username = "information@vff-group.com";
// 	$mail->Password = "vff123";
// 	$mail->SetFrom("information@vff-group.com");
// 	$mail->Subject = $subject;
// 	$mail->Body =$msg;
// 	$mail->addAttachment('ws-commands.pdf',"commands");
// 	$mail->AddAddress($to);
// 	$mail->SMTPOptions=array('ssl'=>array(
// 		'verify_peer'=>false,
// 		'verify_peer_name'=>false,
// 		'allow_self_signed'=>false
// 	));
// 	if(!$mail->Send()){
// 		echo $mail->ErrorInfo;
// 	}else{
// 	return 'Sent';
// }
?>


<?php

$fields = array(
    "sender_id" =>"Jvfbgm",
	"username" =>"evonit304",
	"password" =>"evonit12",
	"droute" => "3",
	"template_id" =>"1207162952378871384",
    "message" => "This is a test message",
    "numbers" => "9742020863",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://dlt.fastsmsindia.com/messages/sendSmsApi",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "intity_id: 120116282324559736",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));


?>

<?php   


?>