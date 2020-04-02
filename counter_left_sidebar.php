<?php
include("connectdb.php");
?>
 
 <!DOCTYPE html>
<html lang="th">
<?php
           
           $query = "SELECT * FROM user WHERE ad_id = '". $_SESSION['ad_id'] . "' ";
           $res = mysqli_query($con,$query);
                                                 
           while ($row = mysqli_fetch_array($res)){
?>

<div class="left-side-menu">
            <div class="slimscroll-menu">
                <!-- User box -->
                <div class="user-box text-center">
                <img  src="assets/images/users/<?php echo $row["image"];?>" class="rounded-circle img-thumbnail avatar-lg">
                    <div class="dropdown">
                        <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block">
                        <?php echo $row["user_name"];?></a>
                        <div class="dropdown-menu user-pro-dropdown">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>My Account</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings mr-1"></i>
                                <span>Settings</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock mr-1"></i>
                                <span>Lock Screen</span>
                            </a>
                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <i class="fe-log-out mr-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-muted"><?php echo $row["user_name"];?></p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="counter_setting.php" class="text-muted">
                                <i class="mdi mdi-settings"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="logout.php" class="text-custom">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul  class="metismenu" id="side-menu">

                        <li class="menu-title">เมนู</li>
                        <li>
                            <a href="counter_dashboard.php?user_id=<?php echo $row["user_id"];?>">
                                <i class="ti-blackboard"></i>
                                <span> แดชบอร์ด </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="ti-clipboard"></i>
                                <span> แบบฟอร์มการตรวจ </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="counter_addform.php">เพิ่มแบบฟอร์ม</a></li>
                                <li><a href="counter_allform.php">ดูทั้งหมด</a></li>
                            </ul>
                            </li>
                        <li>
                           
                        <li>
                            <a href="javascript: void(0);">
                                <i class="ti-truck"></i>
                                <span> รถในระบบ </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="counter_addcar.php?user_id=<?php echo $row["user_id"];?>">เพิ่มรถเข้า</a></li>
                                <li><a href="counter_allcar.php?user_id=<?php echo $row["user_id"];?>">ดูทั้งหมด</a></li>
                            </ul>
                            </li>
                        <li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="ti-user"></i>
                                <span> พนักงานขับรถ </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="counter_adddriver.php">เพิ่มพนักงานขับ</a></li>
                                <li><a href="counter_driver_show.php?user_id=<?php echo $row["user_id"];?>">ดูทั้งหมด</a></li>
                            </ul>
                            </li>
                        <li>
                        <a href="counter_setting.php">
                            <i class="ti-pencil-alt"></i>
                            <span> แก้ไขข้อมูลส่วนตัว </span>
                        </a>
                        </li>
                </div>
            

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
  <?php
           }
           ?>
