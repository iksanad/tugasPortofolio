<!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar static-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav">
                        <li class="nav-item row">
                            <div class="head-master" style="margin-bottom: 0; color: #444; text-decoration: none; align-items: center; margin-right: auto; padding: 20px 20px 0;">
                                <p style="font-size: 40px; font-weight: 500;">{{ $title }}</p>
                            </div>
                        </li>
                    </ul>

                    <!-- Topbar Navbar -->
                    <ul class="ml-auto navbar-nav">
                        
                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow row">
                            <a class="ml-auto nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                                
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('template/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-bs-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="logout">
                                    @csrf
                                    <button class="dropdown-item" type="submit" onclick="confirm('Ingin Logout ?')">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->