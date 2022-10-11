<?php

 $email = "akashjogani93@gmail.com";
 $subject = "About Order Bill";
 $message = "<p>Your order id id  and the bill Amount is .</p>";

//  Put here from mail to pass the mail from this mail id
 $headers = "From: akasjogani.06@gmail.com";
 $headers .= "MIME-Version: 1.0"."\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";


 if (mail("akashjognai93@gmail.com","Success","Send mail from localhost using PHP")) {
     echo "Order Placed Successfully";
 } else {
     echo "Mail has been not sent.";
 }

?>