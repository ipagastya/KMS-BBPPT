  <header class="header">
            <div class="page-brand">
                <a class="link" href="dashboard.php" >
                    <div>
                        <img src="src/image/logokms.png" width="200px" />
                    </div>
                  <!--  <span class="brand" >KMS-BBPPT
                    </span>
                    <span class="brand-mini">KMS</span>-->
                </a>
            </div>
            <div class="flexbox flex-1" style="background-color: #466B97">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                       <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Cari Informasi">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user" >
                        <a class="nav-link dropdown-toggle link" style="width:150px" data-toggle="dropdown">
                            <img src="libs/assets/img/admin-avatar.png" />
                            <span></span><?php echo $_SESSION['level'] ?></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                             <?php 
                            $level = $_SESSION['level'];
                            if($level=='Admin'){
                            ?>
                            <a class="dropdown-item" href="reset_password.php"><i class="fa fa-key"></i>Reset Password</a>
<?php
}
?>

                            <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                        
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>