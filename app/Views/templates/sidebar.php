<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user/index'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(); ?>/img/logo.png" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">Kejaksaan Negeri</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-university"></i><span>Dashboard</span></a>
    </li>
    <?php if (in_groups('admin')) : ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/index'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>User</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/complain'); ?>">
                <i class="fas fa-fw fa-info"></i>
                <span>Komplain</span></a>
        </li>
    <?php endif; ?>

    <?php if (in_groups('user')) : ?>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('complain/index'); ?>">
                <i class="fas fa-fw fa-info"></i>
                <span>Komplain</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('complain/myComplain'); ?>">
                <i class="fas fa-fw fa-receipt"></i>
                <span>Komplain Saya</span></a>
        </li>
    <?php endif; ?>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>