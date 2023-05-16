<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/other/logoavc.png') ?>" alt="Logo Avc" style="width: 50px;">
        </div>
        <!-- <div class="sidebar-brand-text mx-3">SMPIT AVICENNA</div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <?php if (in_groups('user')) {
        $dashboard = '/user';
    } else {
        $dashboard = '/admin';
    } ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= $dashboard; ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Profile
    </div>

    <!-- Nav Item - myprofile -->
    <?php
    $username_hash = base64_encode(user()->username);
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/myProfile/'); ?><?= $username_hash; ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <?php if (in_groups('super admin')) :  ?>
        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Heading -->
        <div class="sidebar-heading">
            Manage User
        </div>

        <!-- Nav Item - admin -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/adminList'); ?>">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>Admin</span></a>
        </li>

        <!-- Nav Item - user -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/userList'); ?>">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>User</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    <?php endif;  ?>



    <?php if (in_groups(['admin', 'super admin'])) :  ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Website</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Website:</h6>
                    <a class="collapse-item" href="/admin/news">News</a>
                    <a class="collapse-item" href="/admin/foto">Images</a>
                    <a class="collapse-item" href="/admin/banner">Banner</a>
                    <a class="collapse-item" href="#">Direktori</a>
                </div>
            </div>
        </li>
    <?php endif;  ?>

    <?php if (in_groups('super admin')) :  ?>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-book"></i>
                <span>PPDB</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">PPDB:</h6>
                    <a class="collapse-item" href="/admin/timeLine">Time Line</a>
                    <a class="collapse-item" href="#">Pendaftaran</a>
                </div>
            </div>
        </li>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/pesan">
                <i class="fas fa-fw fa-comment"></i>
                <span>Message</span></a>
        </li>
    <?php endif;  ?>
    <?php if (in_groups('user')) :  ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            PPDB
        </div>
        <?php $id_hash = base64_encode('ppdb-' . user()->id); ?>
        <li class="nav-item">
            <a class="nav-link" href="/user/formulir/<?= $id_hash; ?>">
                <i class="fas fa-fw fa-file"></i>
                <span>Formulir</span></a>
        </li>
    <?php endif;  ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>