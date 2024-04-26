<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Indah Cemerlang</title>

    <link rel="Shortcut icon" href = "{{ asset('images/Logobaru.jpg') }}"alt="">
    <link rel="stylesheet" crossorigin href="{{ asset('compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('compiled/css/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('compiled/css/table-datatable.css') }}">
</head>

<body>
    <script src="{{ asset('static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ url('dashboard') }}"><img src="{{ asset('images/Logobaru.jpg') }}"
                                    alt="Logo Perusahaan" style="width: 80px; height: auto;">
                            </a>
                        </div>

                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{ url('dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Pegawai</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item  ">
                                    <a href="{{ url('staf') }}" class="submenu-link">Staf</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{ url('supir') }}" class="submenu-link">Supir</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="component-badge.html" class="submenu-link">Palet</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="component-breadcrumb.html" class="submenu-link">Mesin</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="component-button.html" class="submenu-link">Kenek</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="component-card.html" class="submenu-link">Satpam</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-cash-stack"></i>
                                <span>Penggajian</span>
                            </a>
                            <ul class="submenu ">

                                <li class="submenu-item  ">
                                    <a href="{{ url('pegawai') }}" class="submenu-link">Data Pegawai</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="extra-component-comment.html" class="submenu-link">Jam Kerja</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Absensi Karyawan</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script src="{{ asset('static/js/components/dark.js') }}"></script>
    <script src="{{ asset('extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('compiled/js/app.js') }}"></script>



    <!-- Need: Apexcharts -->
    <script src="{{ asset('extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('static/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('static/js/pages/simple-datatables.js') }}"></script>

</body>

</html>
