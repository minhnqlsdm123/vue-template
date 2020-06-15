<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
<!--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"-->
<!--                 style="opacity: .8">-->
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
<!--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu open">
                        <router-link :to="{name:'Dashboard'}" class="nav-link">
                            <i class="fa fa-newspaper" aria-hidden="true"></i>
                            <p>
                                DASHBOARD
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                CATEGORY
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <router-link :to="{name:'AllCategory'}"  class="nav-link">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                                <p>Index</p>
                            </router-link>
                            <router-link :to="{name:'AddCategory'}"  class="nav-link">
                                <i class="fa fa-plus" aria-hidden="true"></i>

                                <p>ADD</p>
                            </router-link>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                POST
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <router-link :to="{name:'AllPost'}"  class="nav-link">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                                <p>Index</p>
                            </router-link>
                            <router-link :to="{name:'AddPost'}"  class="nav-link">
                                <i class="fa fa-plus" aria-hidden="true"></i>

                                <p>ADD</p>
                            </router-link>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>

</script>
