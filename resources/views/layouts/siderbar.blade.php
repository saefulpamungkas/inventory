<div class="sidebar">
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/assets/img/admin.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            @auth
                                {{ auth()->user()->name }}

                                <span class="user-level">{{ auth()->user()->role }}</span>
                            @endauth
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        {{-- <span class="badge badge-count">5</span> --}}
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                @can('admin')
                    <li class="nav-item {{ Request::is('dashboard/datamaster*') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Data Master</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="base">
                            <ul class="nav nav-collapse">
                                <li class="{{ Request::is('dashboard/datamaster/user') ? 'active' : '' }}">
                                    <a href="/dashboard/datamaster/user">
                                        <span class="sub-item">Data User</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('dashboard/datamaster/supplier') ? 'active' : '' }}">
                                    <a href="/dashboard/datamaster/supplier">
                                        <span class="sub-item">Data Supplier</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('dashboard/datamaster/produsen') ? 'active' : '' }}">
                                    <a href="/dashboard/datamaster/produsen">
                                        <span class="sub-item">Data Produsen</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/barang') ? 'active' : '' }}">
                        <a href="/dashboard/barang">
                            <i class="fas fa-briefcase"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                @endcan
                @can('admin')
                    <li class="nav-item {{ Request::is('dashboard/barangmasuk*') ? 'active' : '' }}">
                        <a href="/dashboard/barangmasuk">
                            <i class="fas fa-desktop"></i>
                            <p>Data Barang Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/barangkeluar*') ? 'active' : '' }}">
                        <a href="/dashboard/barangkeluar">
                            <i class="fas fa-truck"></i>
                            <p>Data Barang Keluar</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/produksi*') ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#produksi">
                            <i class="fas fa-boxes"></i>
                            <p>Barang Produksi</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="produksi">
                            <ul class="nav nav-collapse">
                                <li class="{{ Request::is('dashboard/produksi') ? 'active' : '' }}">
                                    <a href="/dashboard/produksi">
                                        <span class="sub-item">Data Barang Produksi</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('dashboard/produksi/masuk') ? 'active' : '' }}">
                                    <a href="/dashboard/produksi/masuk">
                                        <span class="sub-item">Barang Produksi Masuk</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('dashboard/produksi/keluar*') ? 'active' : '' }}">
                                    <a href="/dashboard/produksi/keluar">
                                        <span class="sub-item">Barang Produksi Keluar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan
                <li class="nav-item {{ Request::is('dashboard/datalaporan*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#laporan">
                        <i class="fas fa-file-alt"></i>
                        <p>Data Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="laporan">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('dashboard/datalaporan/barangmasuk') ? 'active' : '' }}">
                                <a href="/dashboard/datalaporan/barangmasuk">
                                    <span class="sub-item">Barang Masuk</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/datalaporan/barangkeluar') ? 'active' : '' }}">
                                <a href="/dashboard/datalaporan/barangkeluar">
                                    <span class="sub-item">Barang Keluar</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/datalaporan/produksi') ? 'active' : '' }}">
                                <a href="/dashboard/datalaporan/produksi">
                                    <span class="sub-item">Barang Produksi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
