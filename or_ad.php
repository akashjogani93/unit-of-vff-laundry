<?php 
    include('connect.php');


    if(isset($_POST['checking_add']))
    {
        $kg=$_POST['kg'];
        $ser=$_POST['ser'];
        $pro=$_POST['pro'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $tot=$_POST['tot'];
        $qot=$_POST['qot'];

        $query="INSERT INTO `orderdel`(`kg`,`service`,`product`,`rate`,`qty`,`tot`,`qot`)VALUES('$kg','$ser','$pro','$price','$qty','$tot','$qot')";
        $exc=mysqli_query($conn,$query);
        if($exc)
        {
            $idd = 0;
            $sql = "SELECT max(id) FROM orderdel";
            $retval = mysqli_query($conn, $sql );
            while($row = mysqli_fetch_assoc($retval)) {
                $idd=$row['max(id)'];
                $idd++;
            }
            echo $idd;
        }else{
            echo $return="something wrong";
        }
    }

?>