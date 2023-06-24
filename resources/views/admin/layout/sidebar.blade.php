  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <small class="navbar-brand  text-light" href="#">{{ Carbon\Carbon::now()->translatedFormat('d F Y') }}</small>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0 light " id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group text-light">
                    
                   
                </div>
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
                <li class="nav-item dropdown">
                    @if(auth()->user())
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="rounded-circle" src="{{ asset('storage/'.auth()->user()->image) }}" width="40px"></a>
                    @else
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    @endif
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                
                        @if(auth()->user())
                        <li><a class="dropdown-item" href="/profile">Profile Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>

                        <form action="/logout" method="post">
                            @csrf
                        <li><button type="submit" class="dropdown-item" >Logout</button></li>
                        </form>
                        @else  
                        <li><a href="/login" class="dropdown-item" >Login</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                          
                                
                            <div class="sb-sidenav-menu-heading ">Core</div>
                           
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                           
                        @auth
                        @if(auth()->user()->is_admin == 1)
                        
                            <div class="sb-sidenav-menu-heading"> Main</div>
                           

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Member
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/list-member">List User</a>
                                    {{-- <a class="nav-link" href="/denda">Data Denda</a> --}}
                                    <a class="nav-link" href="/jabatan">Data Jabatan</a>
                                    {{-- <a class="nav-link" href="/gaji">Gaji</a> --}}
                                  
                                    
                                
                                   
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Absensi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                   
                                     <a class="nav-link" href="/absensi-bulanan">Absensi Bulanan</a>
                                    <a class="nav-link" href="/daily_absensi">Absensi Harian</a>
                                    <a class="nav-link" href="/metode-absensi">Absensi Setting</a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                   
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    {{-- <a class="nav-link" href="/laporan-harian"> Absensi Harian</a>
                                    <a class="nav-link" href="/laporan-bulanan"> Absensi Bulanan</a> --}}
                                    <a class="nav-link" href="/rekap-bulanan"> Rekap Absensi</a>
                                    {{-- <a class="nav-link" href="/laporan-gaji"> Gaji Pegawai</a> --}}
                                    
                                   
                                </nav>
                            </div>
                                @endif
                          
                            
                            <div class="sb-sidenav-menu-heading">Absen</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagesss" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Absen
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePagesss" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                   
                                     <a class="nav-link" href="/absensi">Absen Masuk</a>
                                    <a class="nav-link" href="/absensi-keluar">Absen Keluar</a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        
                                    </div>
                                   
                                </nav>
                            </div>
                            
                            @endauth
                            
                            
                        </div>
                    </div>
                  
                </nav>
            </div>