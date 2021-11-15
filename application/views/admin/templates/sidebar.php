<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>

                    <!-- ============================================================== -->
                    <!-- ADMIN MENUS -->
                    <!-- ============================================================== -->

                    <!-- 1 -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= base_url("admin/pages") ?>" aria-expanded="false"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                    </li>

                    <!-- 2 -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-server"></i>Master</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("admin/pages/categories")  ?>">Categories <span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("/admin/pages/products") ?>">Products</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- 3 -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= base_url("/admin/pages/orders") ?>" aria-expanded="false"><i class="fa fa-fw fa-sort"></i>Orders <span class="badge badge-success">6</span></a>
                    </li>

                    <!-- 4 -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= base_url("/admin/pages/analysis") ?>" aria-expanded="false"><i class="fa fa-fw fa-chart-line"></i>Analysis <span class="badge badge-success">6</span></a>
                    </li>

                    <!-- 5 -->
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= base_url("/admin/pages/report") ?>" aria-expanded="false"><i class="fa fa-fw fa-file"></i>Report <span class="badge badge-success">6</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">