<?php 
include('link.php');
include('connect.php');
?>
<style>
  .sidebar-headers{
  padding:10px;
  background-color:white;

}
h4{
  color:black;
}
</style>

<div id="side" class="page-wrapper chiller-theme toggled">

  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
 
  <i class="fa fa-solid fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#"><h3>Laundry</h3></a>
        <div id="close-sidebar">
          <i class="fa fa-solid fa-bars"></i>
        </div>
      </div>

      <div class="sidebar-headers">
        <div style="margin-left:10px;">
          <a href="#" >
          <img style="width:30px;float:left;margin-right:10px;" class="img-responsive img-rounded" src="assets/image/vff.png" alt="User picture">
          <span >
                <h4>Admin</h4>
            </span>
          </a>
        </div>
      </div>


      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span style="color:#fff">MENU</span>
          </li>
          <li>
            <a href="dashboard.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar">
            <a href="branch.php">
              <i class="fas fa-id-card"></i>
              <span>Branch</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-solid fa-user"></i>
              <span>Employee</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                <a href="add_employee.php"  id="valid">Add Employee</a>
                </li>
                 <li>
                 <a href="view_employee.php"  id="valid">View Employee</a>
                </li>
               
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-solid fa-user"></i>
              <span>Customer</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                <a href="add_cust.php"  id="valid">Add Customer</a>
                </li>
                 <li>
                 <a href="cust_view.php"  id="valid">View Customer</a>
                </li>
               
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-solid fa-user"></i>
              <span>Counter Order</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              <li>
                <a href="orders.php"  id="valid">Add Order</a>
                </li>
                <li>
                <a href="new_order.php"  id="valid">New Order</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-solid fa-user"></i>
              <span>Online Orders</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              <li>
                <a href="online_newOrder.php"  id="valid">New Order</a>
                </li>
                <li>
                <a href="online_orderAsigned.php"  id="valid">Asigned Order</a>
                </li>
                <li>
                <a href="online_orderPickuped.php"  id="valid">Pickuped Order</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-solid fa-user"></i>
              <span>Order Process</span>
            </a>
              <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="uderprocess.php"  id="valid">Underprocess</a>
                </li>
                <li>
                  <a href="readytoDelivery.php"  id="valid">Asign Order</a>
                </li>
                <li>
                  <a href="asigned.php"  id="valid">On The Way</a>
                </li>
                <li>
                  <a href="byWalking.php"  id="valid">By Walking</a>
                </li>
              </ul>
            </div>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fas fa-id-card"></i>
              <span>Service</span>
            </a>
              <div class="sidebar-submenu">
              <ul>
                 <li>
                 <a href="service.php"  id="valid"> Service </a>
                </li>
                <li>
                 <a href="items.php"  id="valid"> Product Master</a>
                </li>
                <li>
                 <a href="addon.php"  id="valid">Addon</a>
                </li>
                <li>
                 <a href="pricing.php"  id="valid">Item Price</a>
                </li>
              </ul>
            </div>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-solid fa-user"></i>
              <span>Reports</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              <li>
                 <a href="complited_orders.php"  id="valid">Completed Orders</a>
                </li>
                <!-- <li>
                 <a href="deliveryBoy.php"  id="valid">Delivery Boys</a>
                </li> -->
                <li>
                <a href="login_reports.php"  id="valid">Login Reports</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar">
            <a href="pass.php">
              <i class="fas fa-id-card"></i>
              <span>Change Password</span>
            </a>
          </li>
  
          
           <li>
            <a href="logout.php">
              <i class="fa fa-power-off"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

  </nav>

  <script>
      if (screen.width < 600) {
       $('#side').removeClass("toggled");
          // download complicated script
          // swap in full-source images for low-source ones
        }
    </script>