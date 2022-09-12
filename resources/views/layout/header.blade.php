<div class="header">
    <div class="container-fluid ps-0 pe-0">
        <div class="row gx-0">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">

                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <i class="ti-bell"></i>
                            <div class="drop-down dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">Recent Notifications</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <i class="ti-email"></i>
                            <div class="drop-down dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-heading">
                                    <span class="text-left">2 New Messages</span>
                                    <a href="email.html">
                                        <i class="ti-pencil-alt pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-right">
                        <div class="dropdown dib">
                            <a class="dropdown-toggle header-icon" href="#" role="button"  data-toggle="dropdown">
                                <span class="user-avatar">Admin
                                </span>
                            </a>
                                <div class="dropdown-profile dropdown-menu" >
                                    <a class="dropdown-item" href="{{ route('admin-dashboard') }}"><i class="ti-user"></i>
                                        <span>Profile</span>
                                    </a><hr class="m-0">
                                    <a class="dropdown-item" href="#"><i class="ti-email"></i>
                                        <span>Inbox</span>
                                    </a><hr class="m-0">
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i>
                                        <span>Setting</span>
                                    </a><hr class="m-0">
                                    <a class="dropdown-item" href="{{ route('authorized.logout') }}"><i class="ti-power-off"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                          </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
