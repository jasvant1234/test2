<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
{{--    <!-- Brand Logo -->--}}
{{--    <a href="" class="brand-link">--}}
{{--        <img src="vendors/dist/img/shopping_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
{{--        <span class="brand-text font-weight-light" style="color:goldenrod">MY SHOPPING</span>--}}
{{--    </a>--}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="vendors/dist/img/me.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block" style="color:goldenrod">MY SHOPPING</a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{route('home')}}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" style="background-color:goldenrod">
                        <i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;&nbsp;
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>

                <li class="nav-header" style="color:goldenrod">ADD CLOTHES</li>

                <li class="nav-item menu-open">
                    <a href="{{route('create_all_clothes')}}" class="nav-link {{ (request()->is('create_all_clothes')) ? 'active' : '' }}">
                        &nbsp;&nbsp;<i class="fa fa-list-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                            ADD CLOTHES
                        </p>
                    </a>
                </li>

                <li class="nav-header" style="color:goldenrod">SHOW CLOTHES</li>

                <li class="nav-item menu-open">
                    <a href="{{route('index')}}" class="nav-link {{ (request()->is('index')) ? 'active' : '' }}">
                        &nbsp;&nbsp;<i class="fa fa-list-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                             All CLOTHES
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{route('create_gents_clothes')}}" class="nav-link {{ (request()->is('create_gents_clothes')) ? 'active' : '' }}">
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-male"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                             GENTS CLOTHES
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{route('create_ladies_clothes')}}" class="nav-link {{ (request()->is('create_ladies_clothes')) ? 'active' : '' }}">
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-female"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                             LADIES CLOTHES
                        </p>
                    </a>
                </li>

                <li class="nav-header" style="color:goldenrod">MAIL CHECK</li>

                <li class="nav-item menu-open">
                    <a href="{{route('mail_details')}}" class="nav-link {{ (request()->is('mail_details')) ? 'active' : '' }}">
                        &nbsp;&nbsp;&nbsp;<i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                            SEND THANKS MAIL
                        </p>
                    </a>
                </li>

{{--                <li class="nav-header" style="color:goldenrod">ALL USER MAIL SEND</li>--}}

{{--                <li class="nav-item menu-open">--}}
{{--                    <a href="{{route('users.index')}}" class="nav-link {{ (request()->is('users.index')) ? 'active' : '' }}">--}}
{{--                        &nbsp;&nbsp;&nbsp;<i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                        <p>--}}
{{--                            ALL USER MAIL SEND--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Main Sidebar Container -->
