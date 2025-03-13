<div class="col-lg-10 col-md-9 fixed-top ms-auto p-0 ">

    <nav class="navbar navbar-expand-lg px-4 shadow topsidebars">
        <form class="" action="">
            <div class="form-group d-flex">
                <input type="text" name="search" id="search" class="form-control-md shadow-none px-2" placeholder="Search..." autocomplete="off" />
                <div class="input-group-append">
                    <button type="submit" id="search-btn" class="btn"><i class="fas fa-search text-light"></i></button>
                </div>
            </div>
        </form>

        <div class="navbar-collapse justify-content-end align-items-center me-4">

            <ul class="navbar-nav">
                <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 topsidelinks"><i class="fa-solid fa-bell"></i></a></li>
                <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 topsidelinks"><i class="fa-solid fa-envelope"></i></a></li>
                <li class="nav-item"><a href="javascript:void(0);" class="nav-link p-3 topsidelinks"><i class="fa-solid fa-message"></i></a></li>
                <li class="nav-item profiles">
                    <a href="javascript:void(0);" class="">
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
                                    <li class="profile-links">
                                        {{-- <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="text-secondary text-decoration-none d-block p-2 my-2" onclick="event.preventDefault(); this.closest('form').submit()">Sign Out</a>
                                            <a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2" onclick="event.preventDefault(); this.parentElement.submit()">Sign Out</a>
                                        </form> --}}

                                        <a href="javascript:void(0);" class="text-secondary text-decoration-none d-block p-2 my-2" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Sign Out</a>
                                        <form id="logoutform" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                </li>
            </ul>

        </div>


    </nav>

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
            <li class="list-group-item completed">A Sann
                <div class="action">
                    <button type="button" class="edit-btn"><i class="fas fa-edit"></i></button>
                    <button type="button" class="delete-btn"><i class="fas fa-trash-alt"></i></button>
                </div>
            </li>
        </ul>
    </div>
    {{-- End Right Layar --}}

</div>
