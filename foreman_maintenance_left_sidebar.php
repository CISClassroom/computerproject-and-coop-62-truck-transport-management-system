<?php
require("connectdb.php");
?>
<?php
           
           $query = "SELECT * FROM user WHERE  ad_id = '". $_SESSION['ad_id'] . "' ";
           $res = mysqli_query($con,$query);
                                                 
           while ($row = mysqli_fetch_array($res)){
?>
                <!-- ========== Left Sidebar Start ========== -->
                <div class="left-side-menu">

                    <div class="slimscroll-menu">

                        <!-- User box -->
                        <div class="user-box text-center">
                        <img  src="assets/images/users/<?php echo $row["image"];?>" class="rounded-circle img-thumbnail avatar-lg">
                            <div class="dropdown">
                                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">
                                    <?php echo $row["user_name"];?>
                                </a>
                                <div class="dropdown-menu user-pro-dropdown">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings mr-1"></i>
                                        <span>ตั้งค่า</span>
                                    </a>
    
                    
    
                                    <!-- item-->
                                    <a href="login.html" class="dropdown-item notify-item">
                                        <i class="fe-log-out mr-1"></i>
                                        <span>ออกจากระบบ</span>
                                    </a>
    
                                </div>
                            </div>
                            <p class="text-muted"><?php echo $row["user_name"];?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">
                                        <i class="mdi mdi-settings"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="text-custom">
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
                                    <a href="foreman_maintenance_status.php">
                                        <i class="ti-truck "></i>
                                        <span> รถที่ผ่านการซ่อมบำรุง </span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="setting_foreman_maintenance.php">
                                        <i class="ti-pencil-alt"></i>
                                        <span> แก้ไขข้อมูลส่วนตัว </span>
                                    </a>
                                </li>
                


              
                            </ul>

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