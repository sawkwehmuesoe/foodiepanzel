<div class="wrapper">
    <nav class="navbar navbar-expand-md p-0">
        <div id="nav" class="navbar-collapse collapse">
            <div class="container-fluid">
                <div class="row">

                    <!-- Start Left Side Bar  -->
                    <div class="col-lg-2 col-md-3 fixed-top vh-100 overflow-auto sidebars">
                        <div class="logoboxs">
                            <a href="{{url('/dashboards')}}"><img src="{{asset('assets/dist/img/logo/foodiepanzellogo.png')}}" width="200" alt="logo"></a>
                        </div>

                        <div class="navlists mt-2">

                            <ul class="navbar-nav flex-column bg-light rounded p-3">
                                <li class="nav-item nav-categories p-2">Dashboard</li>
                                {{-- <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-secondary sidebarlinks" data-bs-toggle="collapse" data-bs-target="#dashboard">Dashboard <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="dashboard" class="collapse sublinks">
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks">Default</a></li>
                                    </ul>
                                </li> --}}

                                <hr class="text-success opacity-25" />

                                <li class="nav-item nav-categories p-2">Page</li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#page"> <i class="fa-regular fa-id-badge pe-1 text-danger"></i> User Profile <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="page" class="collapse sublinks">
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks"><i class="fa-solid fa-street-view"></i> Overview</a></li>
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks"><i class="fa-solid fa-bars-progress"></i> Project</a></li>
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks"><i class="fa-solid fa-bullhorn"></i> Campaing</a></li>
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks"><i class="fa-solid fa-file"></i> Documents</a></li>
                                        <li class="nav-item"><a href="{{route('games.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-gamepad"></i> Games</a></li>
                                    </ul>
                                </li>

                                <hr class="text-success opacity-25" />

                                <li class="nav-item nav-categories p-2">Apps</li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#articles"><i class="fa-solid fa-newspaper pe-1 text-danger"></i> Articles <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="articles" class="collapse sublinks">
                                        <li class="nav-item"><a href="{{route('posts.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-address-card"></i> Post</a></li>
                                        <li class="nav-item"><a href="{{route('searchfoods.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-scroll"></i> Announcement</a></li>
                                        <li class="nav-item"><a href="{{route('searchfoods.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-bowl-food"></i> Search Food</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#usermanagement"><i class="fa-solid fa-people-roof pe-1 text-danger"></i> User Management <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="usermanagement" class="collapse sublinks">
                                        <li class="nav-item"><a href="{{route('customers.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-users"></i> Customers</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#formmanagement"><i class="fa-brands fa-wpforms pe-1 text-danger"></i> Form <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="formmanagement" class="collapse sublinks">
                                        <li class="nav-item"><a href="{{route('attendances.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-clipboard-user"></i> Att Form</a></li>
                                        <li class="nav-item"><a href="{{route('enrolls.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-clipboard-user"></i> Enrolls</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#fixedanalysis"><i class="fa-solid fa-magnifying-glass-chart pe-1 text-danger"></i> Fixed Analysis <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="fixedanalysis" class="collapse sublinks">
                                        <li class="nav-item"><a href="{{route('categories.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-icons"></i> Category</a></li>
                                        <li class="nav-item"><a href="{{route('cities.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-city"></i> City</a></li>
                                        <li class="nav-item"><a href="{{route('countries.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-flag-usa"></i> Country</a></li>
                                        <li class="nav-item"><a href="{{route('days.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-sun"></i> Day</a></li>
                                        <li class="nav-item"><a href="{{route('genders.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-person-half-dress"></i> Gender</a></li>
                                        <li class="nav-item"><a href="{{route('roles.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-circle-user"></i> Role</a></li>
                                        <li class="nav-item"><a href="{{route('stages.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-bars-staggered"></i> Stage</a></li>
                                        <li class="nav-item"><a href="{{route('statuses.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-chart-simple"></i> Status</a></li>
                                        <li class="nav-item"><a href="{{route('tags.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-tags"></i> Tags</a></li>
                                        <li class="nav-item"><a href="{{route('types.index')}}" class="nav-link subbarlinks"><i class="fa-brands fa-typo3"></i> Types</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- End Left Side Bar  -->

                    <!-- Start Top Side Bar -->
                        @include('layouts.adminnavbar')
                    <!-- End Top Side Bar -->
                </div>
            </div>
        </div>
    </nav>
</div>




