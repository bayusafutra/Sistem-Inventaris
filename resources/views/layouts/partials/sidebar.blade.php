<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            @if (auth()->user()->roleuser == 1)
                <li class="menu">
                    <a href="{{ route('admin.dashboard') }}"
                        {{ request()->routeIs('admin.dashboard') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{ route('admin.verifikasi-toko') }}"
                        {{ request()->routeIs('admin.verifikasi-toko') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-briefcase">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16">
                                </path>
                            </svg>
                            <span>Verifikasi Toko</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#master-admin" data-toggle="collapse"
                        {{ request()->routeIs('admin.master-toko', 'admin.master-pengguna') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                            <span>Master</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ request()->routeIs('admin.master-toko', 'admin.master-pengguna') ? 'show' : '' }}"
                        id="master-admin" data-parent="#accordionExample">
                        <li class="{{ request()->routeIs('admin.master-toko') ? 'active' : '' }}">
                            <a href="{{ route('admin.master-toko') }}"> Toko </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.master-pengguna') ? 'active' : '' }}">
                            <a href="{{ route('admin.master-pengguna') }}"> Pengguna </a>
                        </li>
                    </ul>
                </li>
            @elseif (auth()->user()->roleuser == 2)
                <li class="menu">
                    <a href="{{ route('home') }}"
                        {{ request()->routeIs('home') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                        class="dropdown-toggle">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Home</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('pendaftaran-toko') }}"
                        {{ request()->routeIs('pendaftaran-toko') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                        class="dropdown-toggle">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2">
                                </rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                            <span>Pendaftaran Toko</span>
                        </div>
                    </a>
                </li>
            @elseif (auth()->user()->roleuser == 3)
                <li class="menu">
                    <a href="{{ Auth::user()->toko_id ? route('informasi-toko', ['slug' => Auth::user()->toko->slug]) : '#' }}"
                        {{ request()->routeIs('informasi-toko') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                        class="dropdown-toggle">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Informasi Toko</span>
                        </div>
                    </a>
                </li>
                @if (auth()->user()->toko->status == 2)
                    <li class="menu">
                        <a href="{{ Auth::user()->toko_id ? route('manager.dashboard', ['slug' => Auth::user()->toko->slug]) : '#' }}"
                            {{ request()->routeIs('manager.dashboard') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                            class="dropdown-toggle">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
                                    <rect x="4" y="4" width="16" height="16" rx="2" ry="2">
                                    </rect>
                                    <rect x="9" y="9" width="6" height="6"></rect>
                                    <line x1="9" y1="1" x2="9" y2="4"></line>
                                    <line x1="15" y1="1" x2="15" y2="4"></line>
                                    <line x1="9" y1="20" x2="9" y2="23"></line>
                                    <line x1="15" y1="20" x2="15" y2="23"></line>
                                    <line x1="20" y1="9" x2="23" y2="9"></line>
                                    <line x1="20" y1="14" x2="23" y2="14"></line>
                                    <line x1="1" y1="9" x2="4" y2="9"></line>
                                    <line x1="1" y1="14" x2="4" y2="14"></line>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#master-manager" data-toggle="collapse"
                            {{ request()->routeIs('manager.master-staff', 'manager.master-satuan-produk', 'manager.master-produk') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                            class="dropdown-toggle">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span>Master</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->routeIs('manager.master-staff', 'manager.master-satuan-produk', 'manager.master-produk') ? 'show' : '' }}"
                            id="master-manager" data-parent="#accordionExample">
                            <li class="{{ request()->routeIs('manager.master-staff') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('manager.master-staff', ['slug' => Auth::user()->toko->slug]) : '#' }}">Staff</a>
                            </li>
                            <li class="{{ request()->routeIs('manager.master-satuan-produk') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('manager.master-satuan-produk', ['slug' => Auth::user()->toko->slug]) : '#' }}">Satuan
                                    Produk</a>
                            </li>
                            <li class="{{ request()->routeIs('manager.master-produk') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('manager.master-produk', ['slug' => Auth::user()->toko->slug]) : '#' }}">Produk</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#inventaris-manager" data-toggle="collapse"
                            {{ request()->routeIs('manager.pengadaan-restock', 'manager.restock', 'manager.penjualan', 'manager.expired', 'stgudang.retur-supplier', 'stpenjualan.retur-konsumen') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}
                            class="dropdown-toggle">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-package">
                                    <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                                <span>Inventaris</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ request()->routeIs('manager.pengadaan-restock', 'manager.restock', 'manager.penjualan', 'manager.expired', 'stgudang.retur-supplier', 'stpenjualan.retur-konsumen' ) ? 'show' : '' }}"
                            id="inventaris-manager" data-parent="#accordionExample">
                            <li class="{{ request()->routeIs('manager.pengadaan-restock') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('manager.pengadaan-restock', ['slug' => Auth::user()->toko->slug]) : '#' }}">Permintaan
                                    Restock</a>
                            </li>
                            <li class="{{ request()->routeIs('manager.restock') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('manager.restock', ['slug' => Auth::user()->toko->slug]) : '#' }}">Restock</a>
                            </li>
                            <li class="{{ request()->routeIs('manager.penjualan') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('manager.penjualan', ['slug' => Auth::user()->toko->slug]) : '#' }}">Penjualan</a>
                            </li>
                            <li class="{{ request()->routeIs('manager.expired') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('manager.expired', ['slug' => Auth::user()->toko->slug]) : '#' }}">Expired</a>
                            </li>
                            <li class="{{ request()->routeIs('stgudang.retur-supplier') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('stgudang.retur-supplier', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                    Retur Supplier
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('stpenjualan.retur-konsumen') ? 'active' : '' }}">
                                <a
                                    href="{{ Auth::user()->toko_id ? route('stpenjualan.retur-konsumen', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                    Retur Konsumen
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @elseif (auth()->user()->roleuser == 4)
                <li class="menu">
                    <a href="{{ Auth::user()->toko_id ? route('stgudang.dashboard', ['slug' => Auth::user()->toko->slug]) : '#' }}"
                        class="dropdown-toggle"
                        {{ request()->routeIs('stgudang.dashboard') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2">
                                </rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#inventaris-stgudang" class="dropdown-toggle" data-toggle="collapse"
                        {{ request()->routeIs('stgudang.pengadaan-restock', 'stgudang.expired', 'stgudang.retur-supplier') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-package">
                                <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                </path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>Inventaris</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ request()->routeIs('stgudang.pengadaan-restock', 'stgudang.restock', 'stgudang.expired', 'stgudang.retur-supplier') ? 'show' : '' }}"
                        id="inventaris-stgudang" data-parent="#accordionExample">
                        <li class="{{ request()->routeIs('stgudang.pengadaan-restock') ? 'active' : '' }}">
                            <a
                                href="{{ Auth::user()->toko_id ? route('stgudang.pengadaan-restock', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                Permintaan Restock
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('stgudang.restock') ? 'active' : '' }}">
                            <a
                                href="{{ Auth::user()->toko_id ? route('stgudang.restock', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                Restock
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('stgudang.expired') ? 'active' : '' }}">
                            <a
                                href="{{ Auth::user()->toko_id ? route('stgudang.expired', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                Expired
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('stgudang.retur-supplier') ? 'active' : '' }}">
                            <a
                                href="{{ Auth::user()->toko_id ? route('stgudang.retur-supplier', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                Retur Supplier
                            </a>
                        </li>
                    </ul>
                </li>
            @elseif (auth()->user()->roleuser == 5)
                <li class="menu">
                    <a href="{{ Auth::user()->toko_id ? route('stpenjualan.dashboard', ['slug' => Auth::user()->toko->slug]) : '#' }}"
                        class="dropdown-toggle"
                        {{ request()->routeIs('stpenjualan.dashboard') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2">
                                </rect>
                                <rect x="9" y="9" width="6" height="6"></rect>
                                <line x1="9" y1="1" x2="9" y2="4"></line>
                                <line x1="15" y1="1" x2="15" y2="4"></line>
                                <line x1="9" y1="20" x2="9" y2="23"></line>
                                <line x1="15" y1="20" x2="15" y2="23"></line>
                                <line x1="20" y1="9" x2="23" y2="9"></line>
                                <line x1="20" y1="14" x2="23" y2="14"></line>
                                <line x1="1" y1="9" x2="4" y2="9"></line>
                                <line x1="1" y1="14" x2="4" y2="14"></line>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#inventaris-stpenjualan" class="dropdown-toggle" data-toggle="collapse"
                        {{ request()->routeIs('stpenjualan.penjualan', 'stpenjualan.retur-konsumen') ? 'data-active=true aria-expanded=true' : 'aria-expanded=false' }}>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-package">
                                <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                </path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span>Inventaris</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ request()->routeIs('stpenjualan.penjualan', 'stpenjualan.retur-konsumen') ? 'show' : '' }}"
                        id="inventaris-stpenjualan" data-parent="#accordionExample">
                        <li class="{{ request()->routeIs('stpenjualan.penjualan') ? 'active' : '' }}">
                            <a
                                href="{{ Auth::user()->toko_id ? route('stpenjualan.penjualan', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                Penjualan
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('stpenjualan.retur-konsumen') ? 'active' : '' }}">
                            <a
                                href="{{ Auth::user()->toko_id ? route('stpenjualan.retur-konsumen', ['slug' => Auth::user()->toko->slug]) : '#' }}">
                                Retur Konsumen
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
</div>
