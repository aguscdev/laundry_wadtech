<?php 
if ($_SESSION['username']=='') {
    header('location:../admin/login.php');
}
    $user = $_SESSION["username"];
    $user_id = $_SESSION["user_id"];  
    $level = $_SESSION["level"];
?>

<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Menu Utama</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        </ul>
    </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
        <img src="../assets/img/no-avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p>
            <?php 
                echo $_SESSION["username"];
            ?>
        </p>
        <i class="fa fa-circle text-success"></i> Online
        </div>
    </div>
    <br>
    <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li class="">
            <a href="../home/home.php">
                <i class="fa fa-university text-aqua"></i> <span>Home</span>
                <span class="pull-right-container"></span>
            </a>
        </li>
        <?php if ($level == 'ADMIN' || $level == 'USER'){ ?>
        <li>
            <a href="#pelanggan" data-toggle="collapse" class="collapsed"><i class="fa fa-folder text-aqua"></i> <span>Pelanggan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="pelanggan" class="collapse ">
                <ul class="nav">
                    <li><a href="../pelanggan/v_pelanggan.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp List Pelanggan</a></li>
                   <!--  <li><a href="../pelanggan/v_add_pelanggan.php" class=""><i class="fa fa fa-desktop text-aqua"></i> &nbsp Monitoring</a></li> -->
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if ($level == 'ADMIN' || $level == 'USER'){ ?>
        <li>
            <a href="#transaksi" data-toggle="collapse" class="collapsed"><i class="fa fa-folder text-aqua"></i> <span>Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="transaksi" class="collapse ">
                <ul class="nav">
                    <li><a href="../transaksi/v_transaksi.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp List Transaksi</a></li>
                   <!--  <li><a href="../pelanggan/v_add_pelanggan.php" class=""><i class="fa fa fa-desktop text-aqua"></i> &nbsp Monitoring</a></li> -->
                </ul>
            </div>
        </li>
        <?php } ?>
        <?php if ($level == 'ADMIN' || $level == 'USER'){ ?>
        <li>
            <a href="#laporan" data-toggle="collapse" class="collapsed"><i class="fa fa-folder text-aqua"></i> <span>Laporan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="laporan" class="collapse ">
                <ul class="nav">
                    <li><a href="../laporan/laporan_transaksi.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp Laporan Transaksi</a></li>
                   <!--  <li><a href="../pelanggan/v_add_pelanggan.php" class=""><i class="fa fa fa-desktop text-aqua"></i> &nbsp Monitoring</a></li> -->
                </ul>
            </div>
        </li>
        <?php } ?>
         <?php if ($level == 'ADMIN'){ ?>
        <li>
            <a href="#pengaturan" data-toggle="collapse" class="collapsed"><i class="fa fa-folder text-aqua"></i> <span>Pengaturan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="pengaturan" class="collapse ">
                <ul class="nav">
                    <li><a href="../harga/v_edit_harga.php" class=""><i class="fa fa-usd text-aqua"></i> &nbsp Pengaturan Harga</a></li>
                    <li><a href="../admin/v_ganti_password.php" class=""><i class="fa fa-cog text-aqua"></i> &nbsp Ganti Password</a></li>
                   <!--  <li><a href="../pelanggan/v_add_pelanggan.php" class=""><i class="fa fa fa-desktop text-aqua"></i> &nbsp Monitoring</a></li> -->
                </ul>
            </div>
        </li>
        <?php } ?>
         <!-- <?php if ($level == 'ADMIN' || $level == 'USER'){ ?>
        <li>
            <a href="#amc" data-toggle="collapse" class="collapsed"><i class="fa fa-folder text-aqua"></i> <span>Pelanggan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="amc" class="collapse ">
                <ul class="nav">
                    <li><a href="../pelanggan/v_pelanggan.php" class=""><i class="fa fa-list text-aqua"></i> &nbsp List Pelanggan</a></li>
                    <?php if ($level == 'USER'){ ?>
                    <li><a href="../pelanggan/v_add_pelanggan.php" class=""><i class="fa fa fa-desktop text-aqua"></i> &nbsp Monitoring</a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <?php } ?> -->
        <?php if ($level == 'ADMIN'){ ?>
        <li class="">
            <a href="../user/v_user.php">
                <i class="fa fa-user-o text-aqua"></i><span>User</span>
                <span class="pull-right-container"></span>
            </a>
        </li>
        <?php } ?>
       <!--  <li class="">
            <a href="../admin/v_ganti_password.php">
                <i class="fa fa fa-cog text-aqua"></i><span>Ganti Password</span>
                <span class="pull-right-container"></span>
            </a>
        </li> -->
        <li>
            <a href="../admin/logout.php">
                <i class="fa fa-power-off text-red"></i><span>Logout</span>
                <span class="pull-right-container"></span>
            </a>
        </li>
    </ul>
    </section>
    <!-- /.sidebar -->
</aside>