<!DOCTYPE html>
<html lang="en" data-bs-theme="">

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

                        <li class="sidebar-title">Selamat Datang, {{ Auth::user()->nama_pegawai }}</li>

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
                                    <a href="{{ url('palet') }}" class="submenu-link">Palet</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{ url('mesin') }}" class="submenu-link">Mesin</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{ url('kenek') }}" class="submenu-link">Kenek</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{ url('satpam') }}" class="submenu-link">Satpam</a>
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
                                    <a href="{{ url('jam_kerja') }}" class="submenu-link">Jam Kerja</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Presensi Karyawan</span>
                            </a>
                            <ul class="submenu ">

                                <li class="submenu-item  ">
                                    <a href="{{ url('presensi/create') }}" class="submenu-link">Presensi</a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="{{ url('presensi') }}" class="submenu-link">Data Presensi</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ url('pengaturan') }}" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="{{ route('logout') }}" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectPegawai = document.getElementById('id_pegawai');
            const selectJamKerja = document.getElementById('id_jam_kerja');

            selectPegawai.addEventListener('change', function() {
                const selectedPegawaiId = selectPegawai.value;
                // Kirim permintaan Ajax untuk mendapatkan jam kerja yang sesuai dengan pegawai yang dipilih
                fetch(`/get-jam-kerja/${selectedPegawaiId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Hapus semua opsi yang ada pada select jam kerja
                        selectJamKerja.innerHTML = '';
                        // Tambahkan opsi jam kerja yang baru
                        data.forEach(jamKerja => {
                            const option = document.createElement('option');
                            option.value = jamKerja.id_jam_kerja;
                            option.textContent = jamKerja.jam_kerja;
                            selectJamKerja.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Terjadi kesalahan:', error));
            });

            // Lakukan permintaan Ajax saat halaman dimuat untuk pertama kali
            const initialPegawaiId = selectPegawai.value;
            fetch(`/get-jam-kerja/${initialPegawaiId}`)
                .then(response => response.json())
                .then(data => {
                    // Hapus semua opsi yang ada pada select jam kerja
                    selectJamKerja.innerHTML = '';
                    // Tambahkan opsi jam kerja yang baru
                    data.forEach(jamKerja => {
                        const option = document.createElement('option');
                        option.value = jamKerja.id_jam_kerja;
                        option.textContent = jamKerja.jam_kerja;
                        selectJamKerja.appendChild(option);
                    });
                })
                .catch(error => console.error('Terjadi kesalahan:', error));
        });
    </script>
    <script src="{{ asset('extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('compiled/js/app.js') }}"></script>

    @include('sweetalert::alert')

    <!-- Need: Apexcharts -->
    <script src="{{ asset('extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('static/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('static/js/pages/simple-datatables.js') }}"></script>

</body>

</html>
