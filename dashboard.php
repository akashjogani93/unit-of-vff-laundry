



<?php include("sidebar.php");

 ?>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">Dashboard </h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>


<?php 
function get_Dash_Data($conn,$query){
    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
    $o=mysqli_fetch_array($confirm);
    return $o['0'];
}



    
    

?>

<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-lg-4">
                
                <div class="card" style="width: 18rem; background-color:rgb(216, 217, 207)">
                    <a href="online_newOrder.php" style="text-Decoration:none;">
                    <img src="assets/image/105267335-wicker-basket-with-clothes-on-ironing-board-at-dry-cleaner-s.webp" class="card-img-top" height="100px" alt="...">
                    <div class="card-body">
                        <b style="font-size:32px; color:black;"><?php echo get_Dash_Data($conn,"SELECT  COUNT(`CoId`) FROM `couterorder` WHERE `orderType`='Online' AND `status`= '10' ;"); ?></b><p class="card-text"><b>Online Order Requests</b></p>
                    </div></a>
                </div>
            </div>
            <div class="col-lg-4">
                
                <div class="card" style="width: 18rem; ">
                    <a href="new_order.php" style="text-Decoration:none;">
                    <img src="assets/image/counter1.jpg" class="card-img-top" height="100px" alt="...">
                    <div class="card-body">
                        <b style="font-size:32px; color:black;"><?php echo get_Dash_Data($conn,"SELECT  COUNT(`CoId`) FROM `couterorder` WHERE `orderType`='Counter' AND `status`= '0' ;"); ?></b><p class="card-text"><b>Counter New Order</b></p>
                    </div></a>
                </div>
            </div>
            <div class="col-lg-4">
                
                <div class="card" style="width: 18rem; background-color:rgb(216, 217, 207)">
                    <a href="uderprocess.php" style="text-Decoration:none;">
                    <img src="assets/image/105267335-wicker-basket-with-clothes-on-ironing-board-at-dry-cleaner-s.webp" class="card-img-top" height="100px" alt="...">
                    <div class="card-body">
                        <b style="font-size:32px; color:black;"><?php echo get_Dash_Data($conn,"SELECT  COUNT(`CoId`) FROM `couterorder` WHERE `status`= '1' ;"); ?></b><p class="card-text"><b>Underprocess Orders</b></p>
                    </div></a>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-lg-4">
                
                <div class="card" style="width: 18rem;">
                    <a href="asigned.php" style="text-Decoration:none;">
                    <img src="assets/image/asign.jpg" class="card-img-top" height="100px" alt="...">
                    <div class="card-body">
                        <b style="font-size:32px; color:black;"><?php echo get_Dash_Data($conn,"SELECT  COUNT(`CoId`) FROM `couterorder` WHERE  `status`= '3' ;"); ?></b><p class="card-text"><b>Asigned For Delivery</b></p>
                    </div></a>
                </div>
            </div>
            <div class="col-lg-4">
                
                <div class="card" style="width: 18rem; background-color:rgb(216, 217, 207);">
                    <a href="complited_orders.php" style="text-Decoration:none;">
                    <img src="assets/image/asign1.jpg" class="card-img-top" height="100px" alt="...">
                    <div class="card-body">
                        <b style="font-size:32px; color:black;"><?php echo get_Dash_Data($conn,"SELECT  COUNT(`CoId`) FROM `couterorder` WHERE `orderType`='Online' AND `status`= '4' ;"); ?></b><p class="card-text"><b>Online Order Completed</b></p>
                    </div></a>
                </div>
            </div>
            <div class="col-lg-4">
                
                <div class="card" style="width: 18rem;">
                    <a href="complited_orders.php" style="text-Decoration:none;">
                    <img src="assets/image/last.png" class="card-img-top" height="100px" alt="...">
                    <div class="card-body">
                        <b style="font-size:32px; color:black;"><?php echo get_Dash_Data($conn,"SELECT  COUNT(`CoId`) FROM `couterorder` WHERE `orderType`='Counter' AND `status`= '4' ;"); ?></b><p class="card-text"><b>Counter Order Completed</b></p>
                    </div></a>
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="row d-flex . justify-content-center">
            
            <div class="count_stortcut bg-success">
                <div class="row">
                    <div class="col-md-3 col-4">
                        <h1 class="m-2"><?php echo get_Dash_Data($conn,"SELECT DISTINCT COUNT(`CoId`) FROM `couterorder` WHERE `orderType`='Online';"); ?></h1>
                    </div>
                    <div class="col-md-3 offset-4">
                        <i class="fas fa-teacher fa-3x m-2"></i>
                    </div>
                </div>
                <div class="header_msg text-center">Online Orders</div>
            </div>
        </div>
        <div class="row d-flex . justify-content-center">
            <div class="count_stortcut" style="background-color:#B3B54C;">
                <div class="row">
                    <div class="col-md-3 col-4">
                        <h1 class="m-2">
                    </div>
                    <div class="col-md-3 offset-4">
                        <i class="fas fa-user-graduate fa-3x m-2"></i>
                    </div>
                </div>
                <div class="header_msg text-center">Counter Orders</div>
            </div>
        </div>
        <div class="row d-flex . justify-content-center">
            <div class="count_stortcut "style="background-color:#CEC46A;">
                <div class="row">
                    <div class="col-md-3 col-4">
                        <h1 class="m-2">
                    </div>
                    <div class="col-md-3 offset-4">
                        <i class="fas fa-teacher fa-3x m-2"></i>
                    </div>
                </div>
                <div class="header_msg text-center">Counter Underprocessing</div>
            </div>
        </div>
        <div class="row d-flex . justify-content-center">
            <div class="count_stortcut " style="background-color:#625A11;">
                <div class="row">
                    <div class="col-md-3 col-4">
                    <h1 class="m-2">
                    </div>
                    <div class="col-md-3 offset-4">
                        <i class="fas fa-teacher fa-3x m-2"></i>
                    </div>
                </div>
                <div class="header_msg text-center">Counter Completed</div>
            </div>
        </div>
    </div> -->
    <hr />    
</main>
</br>
</br>
</br>
<?php include('footer.php'); ?>

</div>



</body>

</html>
