<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="index.html" class="logo">
            <span class="logo-light">
                <i class="mdi mdi-camera-control"></i> Stexo
            </span>
            <span class="logo-sm">
                <i class="mdi mdi-camera-control"></i>
            </span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">



            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                </a>
            </li>



            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?=asset('public')?>/assets/images/users/user-4.jpg" alt="user"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">


                        <a class="<?= asset('logout');?>" href="#"><i class="mdi mdi-power text-danger"></i>
                            Logout</a>
                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="d-none d-md-inline-block">
                <form role="search" class="app-search">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
        </ul>

    </nav>

</div>
<!-- Top Bar End -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>


                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span>
                            Ürünler <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </span></a>
                    <ul class="submenu">
                        <li><a href="<?= asset("product") ?>">Ürün Listesi</a></li>
                        <li><a href="<?= asset("category") ?>">Kategoriler</a></li>

                    </ul>
                </li>



            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->