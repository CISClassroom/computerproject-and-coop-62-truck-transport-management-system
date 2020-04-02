<?php
require("connectdb.php");
?>
 
 <!DOCTYPE html>
<html lang="th">
<?php
           
           $query = "SELECT * FROM user WHERE  ad_id = '". $_SESSION['ad_id'] . "' ";
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
                    <p class="text-muted">แผนกจ่ายงาน</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="dispatch_setting.php" class="text-muted">
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
                            <a href="javascript: void(0);">
                                <i class="ti-truck"></i>
                                <span> รถที่พร้อมใช้งาน </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="dispatch_past_car_check.php?user_id=<?php echo $row["user_id"];?>">รถที่ยังไม่ได้จ่ายงาน</a></li>
                                <li><a href="dispatch_work_seccess.php">รถที่จ่ายงานแล้ว</a></li>
                            </ul>
                            </li>
                        <li>
                        <a href="dispatch_setting.php">
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
