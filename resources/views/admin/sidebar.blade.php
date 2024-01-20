<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar menus -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menus"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- Danh muc --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menus/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menus/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Bai Dang --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Bài đăng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/posts/daduyet" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bài đăng đã duyệt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/posts/chuaduyet" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bài đăng chưa duyệt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/posts/bikhoa" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bài đăng bị từ chối</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Tai khoan --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p> Tài Khoản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/accs/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Tài Khoản</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/accs/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài Khoản Người Dùng </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/accs/listAdmin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài Khoản Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Doanh thu --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas  fa-th-list"></i>
                        <p> Thống kê
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/accs/success" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Các bài trao đổi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/accs/revenue" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Người dùng đã nạp</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="/admin/posts/totalformenu" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Theo danh mục</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="/admin/posts/phithu" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tổng phí thu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Đăng xuất
                        </p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menus -->
    </div>
    <!-- /.sidebar -->
</aside
