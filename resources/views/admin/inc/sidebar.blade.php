<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
        <img src="{{asset('AdminAssets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Clinic Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('AdminAssets')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
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
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->



                    {{-- Doctor --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Doctors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.doctor.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doctors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.doctor.archive')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Archive</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.doctor.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Doctor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                     {{-- Major --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Majors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.major.index')}}"  class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Majors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.major.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New major</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    {{-- Booking --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Booking
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.booking.index')}}"  class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.booking.bookedDate')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Booked</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.booking.detectedDate')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Detected</p>
                            </a>
                        </li>
                    </ul>
                </li>
                     {{-- users --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Members
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}"  class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user.showUsers')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user.showAdmins')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admins</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Contacts --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Contacts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.contact.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Settings --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.setting.home')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
