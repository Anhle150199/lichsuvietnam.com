    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
            <div class="sidebar-brand-icon ">
            <img src="<?php echo url('/'); ?>/img/core-img/favicon.png"   style="opacity: .8; width: 80%;">
            </div>
            <div class="sidebar-brand-text">Admin <sup></sup></div>
        </a>

        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Trang tổng quan</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
        Thành viên
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admins-list') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('users-list') }}"  >
                <i class="fas fa-fw fa-users"></i>
                <span>Người dùng</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Studio
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('posts-list') }}" >
                <i class="fas fa-fw fa-file"></i>
                <span>Bài viết</span>
            </a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('comments') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Bình luận</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->