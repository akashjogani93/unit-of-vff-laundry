<?php include("connect.php"); 

    //print_r($_POST);
    $add=$_POST['addn'];
    $price=$_POST['price'];
    $qtyy=$_POST['qtyy'];
    $tot=$_POST['tot'];
    $pid=$_POST['pid'];
    foreach($add as $key => $value)
    {
        echo $value."--".$qtyy[$key];
        $a_name=$value;
        $p_price=$price[$key];
        $q_qtyy=$qtyy[$key];
        $t_tot=$tot[$key];
        $p_pid=$pid[$key];
        $query="INSERT INTO `add_adon`(`pro_id`,`addon`,`rate`,`qty`,`total`)VALUES('$p_pid','$a_name','$p_price','$q_qtyy','$t_tot')";
        $exe=mysqli_query($conn,$query);

    }
    if($exe)
    {
        echo 'inserted';
        
    }
    else
    {
        echo 'not';
    }
    

?>