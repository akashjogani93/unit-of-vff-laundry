<?php
  //echo $return="hello";
  include("connect.php");

  $query="SELECT * FROM orderdel";
  $exc=mysqli_query($conn,$query);
  $a=[];
  if(mysqli_num_rows($exc) > 0)
  {
    foreach($exc as $row)
    {
        //$row['product'];
        array_push($a,$row);
    }
    header('content-type: application/json');
    echo json_encode($a);
  }else{
        echo "Not Found!..";
  }
?>
