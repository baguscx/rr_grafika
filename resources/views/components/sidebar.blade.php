            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @if(Auth::user()->hasRole('admin'))
                                {{-- <a class="nav-link" href="{{Auth::user()->hasRole('admin') ? route('admin.index') : route('owner.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a> --}}
                                <div class="sb-sidenav-menu-heading">Menu Utama</div>
                                <a class="nav-link" href="{{route('barang.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                    Data Barang
                                </a>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dropdownCollapse" aria-expanded="false" aria-controls="dropdownCollapse">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-down"></i></div>
                                    Transaksi
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="dropdownCollapse" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                      <a class="nav-link" href="{{route('transaksi.pemasukan')}}">Pemasukan</a>
                                      <a class="nav-link" href="{{route('transaksi.pengeluaran')}}">Pengeluaran</a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="{{route('transaksi.laporan')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                    Laporan
                                </a>
                            @elseif(Auth::user()->hasRole('owner'))
                                <a class="nav-link" href="{{Auth::user()->hasRole('admin') ? route('admin.index') : route('owner.index')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Menu Utama</div>
                                <a class="nav-link" href="{{route('gaji')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                    Penggajian
                                </a>
                                <a class="nav-link" href="{{route('transaksi.laporan')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                    Laporan
                                </a>
                            @endif


                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{Auth::user()->name}}
                    </div>
                </nav>
            </div>
