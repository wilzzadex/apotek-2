<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            @if (auth()->user()->role == 'admin')
            <li class="menu-item {{ Request::is('admin/dashboard*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('back.dashboard') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-tachometer-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu {{ Request::is('admin/unit*') ||  Request::is('admin/obat*') ||  Request::is('admin/pelanggan*') || Request::is('admin/user*') || Request::is('admin/suplier*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <i class="fas fa-table"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Master Data</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="80" style="">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ Request::is('admin/user*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('back.user') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data User</span>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('admin/suplier*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('suplier') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Suplier</span>
                            </a>
                        </li>
                       
                        <li class="menu-item {{ Request::is('admin/unit*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('unit') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Unit</span>
                            </a>
                        </li>

                       

                        {{-- <li class="menu-item {{ Request::is('admin/kategori*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('unit') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Kategori</span>
                            </a>
                        </li>

                        <li class="menu-item {{ Request::is('admin/golongan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('unit') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Golongan</span>
                            </a>
                        </li> --}}

                        <li class="menu-item {{ Request::is('admin/obat*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('obat') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Obat</span>
                            </a>
                        </li>

                        <li class="menu-item {{ Request::is('admin/pelanggan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('pelanggan') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Pelanggan</span>
                            </a>
                        </li> 
                       
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu {{ Request::is('admin/transaksi*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <i class="fas fa-shopping-cart"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Transaksi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="80" style="">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ Request::is('admin/transaksi/order*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('order') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pembelian Obat</span>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('admin/transaksi/histori_pembelian*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('histori.pembelian') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Histori Pembelian Obat</span>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('admin/transaksi/histori_penjualan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('histori.penjualan') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Histori Penjualan Obat</span>
                            </a>
                        </li>
                        
                       
                       
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu {{ Request::is('admin/laporan*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <i class="fas fa-file"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Laporan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="80" style="">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ Request::is('admin/laporan/penjualan/index*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('laporan.penjualan.index2') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Laporan Penjualan</span>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('admin/laporan/pembelian*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('laporan.pembelian') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Laporan Pembelian</span>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('admin/laporan/penjualan') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('laporan.penjualan') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Laba Rugi</span>
                            </a>
                        </li>
                        {{-- <li class="menu-item {{ Request::is('admin/transaksi/histori_penjualan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('histori.pembelian') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pembelian Obat</span>
                            </a>
                        </li> --}}
                        
                       
                       
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu {{ Request::is('admin/pengaturan*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <i class="fas fa-cogs"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Pengaturan Aplikasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="80" style="">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ Request::is('admin/pengaturan/tampilan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('pengaturan.tampilan') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Tampilan Aplikasi</span>
                            </a>
                        </li>
                        
                       
                       
                    </ul>
                </div>
            </li>
            @endif

            @if (auth()->user()->role == 'kasir')
            <li class="menu-item {{ Request::is('admin/dashboard*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('back.dashboard') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-tachometer-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('kasir*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('kasir.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-cash-register"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Menu Penjualan</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/obat*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('obat') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                    <i class="fas fa-boxes">
                       
                    </i>
                    </span>
                    <span class="menu-text">Lihat Stok Obat</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/pelanggan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('pelanggan') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                    <i class="fas fa-users">
                       
                    </i>
                    </span>
                    <span class="menu-text">Data Pelanggan</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/transaksi/histori_penjualan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('histori.penjualan') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-history"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Histori Penjualan</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/laporan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('laporan.penjualan.index2') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-file-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Laporan Penjualan</span>
                </a>
            </li>
            
            @endif
           

            
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>