<div class="wrapper">
    <nav class="navbar navbar-expand-md p-0">
        <div id="nav" class="navbar-collapse collapse">
            <div class="container-fluid">
                <div class="row">

                    <!-- Start Left Side Bar  -->
                    <div class="col-lg-2 col-md-3 fixed-top vh-100 overflow-auto sidebars">
                        <div class="logoboxs">
                            <img src="{{asset('assets/dist/img/logo/foodiepanzellogo.png')}}" width="200" alt="logo">
                        </div>

                        <div class="navlists mt-2">

                            <ul class="navbar-nav flex-column">
                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#dashboard">Dashboard <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="dashboard" class="collapse sublinks">
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks">Default</a></li>
                                    </ul>
                                </li>

                                <hr class="text-success opacity-25" />

                                <li class="nav-item nav-categories p-2">Page</li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#page">User Profile <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="page" class="collapse sublinks">
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks">Overview</a></li>
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks">Project</a></li>
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks">Campaing</a></li>
                                        <li class="nav-item"><a href="javascript:void(0);" class="nav-link subbarlinks">Documents</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item nav-categories p-2">Apps</li>

                                <li class="nav-item"><a href="javascript:void(0);" class="nav-link sidebarlinks" data-bs-toggle="collapse" data-bs-target="#usermanagement">User Management <i class="fas fa-angle-down mores"></i></a>
                                    <ul id="usermanagement" class="collapse sublinks">
                                        <li class="nav-item"><a href="{{route('customers.index')}}" class="nav-link subbarlinks">Customers</a></li>
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
                                                        <li class=""><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Profile</a></li>
                                                        <li class=""><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Project</a></li>
                                                        <li class=""><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Subscription</a></li>
                                                        <li class=""><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">My Statements</a></li>
                                                        <li class=""><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">Language</a></li>
                                                        <li class=""><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">Account Setting</a></li>
                                                        <li class=""><a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2">Sign Out</a></li>
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


