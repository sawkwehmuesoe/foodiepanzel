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
                                    </ul>
                                </li>

                                <hr class="text-success opacity-25" />

                                <li class="nav-item nav-categories p-2">Apps</li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#usermanagement"><i class="fa-solid fa-people-roof pe-1 text-danger"></i> User Management <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="usermanagement" class="collapse sublinks">
                                        <li class="nav-item"><a href="{{route('customers.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-users"></i> Customers</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#fixedanalysis"><i class="fa-solid fa-magnifying-glass-chart pe-1 text-danger"></i> Fixed Analysis <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="fixedanalysis" class="collapse sublinks">
                                        <li class="nav-item"><a href="{{route('statuses.index')}}" class="nav-link subbarlinks"><i class="fa-solid fa-hourglass-half"></i> Status</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- End Left Side Bar  -->

                    <!-- Start Top Side Bar -->
                    <div class="col-lg-10 col-md-9 ms-auto p-0 ">

                        <nav class="navbar navbar-expand-lg px-4 py-0 shadow topsidebars">
                            <form class="" action="">
                                <div class="form-group d-flex">
                                    <input type="text" name="search" id="search" class="form-control-md shadow-none px-2" placeholder="Search..." autocomplete="off" />
                                    <div class="input-group-append">
                                        <button type="submit" id="search-btn" class="btn"><i class="fas fa-search text-light"></i></button>
                                    </div>
                                </div>
                            </form>

                            <div class="navbar-collapse justify-content-end me-4">

                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 topsidelinks"><i class="fa-solid fa-bell"></i></a></li>
                                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 topsidelinks"><i class="fa-solid fa-envelope"></i></a></li>
                                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 topsidelinks"><i class="fa-solid fa-message"></i></a></li>
                                    <li class="nav-item profiles">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <img src="https://preview.keenthemes.com/keen/demo1/assets/media/avatars/300-3.jpg" class="rounded" width="45" />
                                        </a>
                                            <div class="profile-boxes">
                                                <div class="d-flex user-profiles">
                                                    <div class="me-3">
                                                        <img src="https://preview.keenthemes.com/keen/demo1/assets/media/avatars/300-3.jpg" class="rounded" width="55" />
                                                    </div>
                                                    <div class="paragraps">
                                                        <p class="text-dark fw-bold">{{ $userdata['name'] }}</p>
                                                        <a href="">{{ $userdata['email'] }}</a>
                                                        <span class="badge bg-success">pro</span>
                                                    </div>
                                                </div>
                                                <div class="profile-lists">
                                                    <ul class="list-unstyled my-1">
                                                        <li class="profile-links"><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Profile</a></li>
                                                        <li class="profile-links"><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Project</a></li>
                                                        <li class="profile-links subscriptions"><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Subscription  <i class="fas fa-angle-right mores"></i></a>
                                                            <div class="subscription-boxes">
                                                                <ul class="list-unstyled my-1">
                                                                    <li class="subscription-links"><a href="javascript:void(0);" id="myscription" class="text-secondary text-decoration-none d-block p-2 my-2">My Cook List</a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li class="profile-links"><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Statements</a></li>
                                                        <li class="profile-links"><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">Language</a></li>
                                                        <li class="profile-links"><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">Account Setting</a></li>
                                                        <li class="profile-links"><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">Sign Out</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                    </li>
                                </ul>

                            </div>


                        </nav>


                    </div>


                    <!-- End Top Side Bar -->

                </div>
            </div>
        </div>
    </nav>
</div>

 {{-- Start Right Layar --}}
 <div id="tocooklists" class="tocooklists shadow">

    <button class="btn btn-secondary p-3 btn-close cookclosebtn"></button>
    <h3>My Todo List</h3>
    <small>Left click to complete & Right click to delete</small>
    <form id="tocookform">
        <div class="form-group">
            <input type="text" name="cookbox" id="cookbox" class="form-control p-3 " placeholder="Write Something..." autocomplete="off" autofocus >
        </div>
    </form>

    <ul id="cookgroups" class="list-group">

    </ul>
 </div>
 {{-- End Right Layar --}}


