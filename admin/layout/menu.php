<?php
//error_reporting(0);
if (!isset($_SESSION["login"])) {
    session_start();
}

?>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Smart Agronomy</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Administrador</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <!-- Menus adminsitrador generarl -->
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                    <!-- ======================================================= -->
                    <?php
                    include('layout/roles/adminGeneral.php');
                    ?>
                    <!-- ======================================================= -->
                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                    <!-- ======================================================= -->
                    <?php
                    include('layout/roles/supervisorGeneral.php');
                    ?>
                    <!-- ======================================================= -->
                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                    <!-- ======================================================= -->
                    <?php
                    include('layout/roles/supervisorGeneral.php');
                    ?>
                    <!-- ======================================================= -->
                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                    <!-- ======================================================= -->
                    <?php
                    include('layout/roles/tecnico.php');
                    ?>
                    <!-- ======================================================= -->
                </ul>

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->

                    <!-- ======================================================= -->
                    <?php
                    include('layout/roles/ejecutivo.php');
                    ?>
                    <!-- ======================================================= -->
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

        <!-- /.sidebar-custom -->
    </aside>

</div>