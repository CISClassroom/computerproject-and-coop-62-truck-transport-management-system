<?php
require("connectdb.php");
?>
<?php

$query = "SELECT * FROM user WHERE  ad_id = '" . $_SESSION['ad_id'] . "' ";
$res = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($res)) {
?>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!-- User box -->
            <div class="user-box text-center">
                <img src="assets/images/users/<?php echo $row["image"]; ?>" class="rounded-circle img-thumbnail avatar-lg">
                <div class="dropdown">
                    <a href="#" class="text-dark h5 mt-2 mb-1 d-block" data-toggle="dropdown">
                        <?php echo $row["user_name"]; ?>
                    </a>
                    <div class="dropdown-menu user-pro-dropdown">


                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings mr-1"></i>
                            <span>ตั้งค่า</span>
                        </a>



                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-log-out mr-1"></i>
                            <span>ออกจากระบบ</span>
                        </a>

                    </div>
                </div>
                <p class="text-muted">หัวหน้างานตรวจสภาพ</p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="setting_foreman_inspection.php" class="text-muted">
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

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">เมนู</li>
                    
                    <li>
                        <a href="inspection_foreman_status.php?user_id=<?php echo $row["user_id"];?>">
                            <i class="ti-truck"></i>
                            <span> รายการรถที่ส่งผลตรวจสภาพ </span>
                        </a>
                    </li>
                    <li>
                        <a href="setting_inspection_foreman.php">
                            <i class="ti-pencil-alt"></i>
                            <span> แก้ไขข้อมูลส่วนตัว </span>
                        </a>
                    </li>
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