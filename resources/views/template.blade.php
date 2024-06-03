<!DOCTYPE html>
<html lang="en" data-bs-theme="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Indah Cemerlang</title>

    <link rel="Shortcut icon" href = "{{ asset('images/Logobaru.jpg') }}"alt="">
    <link rel="stylesheet" crossorigin href="{{ asset('compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('compiled/css/app-dark.css') }}">
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
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
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

                        <li class="sidebar-item">
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
                                    <a href="{{ url('pegawai') }}" class="submenu-link">Data Pegawai</a>
                                </li>
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
                        <li class="sidebar-item  ">
                            <a href="{{ url('jam_kerja') }}" class='sidebar-link'>
                                <i class="bi bi-clock-fill"></i>
                                <span>Jam Kerja</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ url('penggajian') }}" class='sidebar-link'>
                                <i class="bi bi-cash-stack"></i>
                                <span>Penggajian</span>
                            </a>
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
                        <li class="sidebar-item ">
                            <a href="#" class='sidebar-link' id="logout-link">
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

    <script src="{{ asset('extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('compiled/js/app.js') }}"></script>

    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('logout-link').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda perlu login ulang untuk mengakses website!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim permintaan logout menggunakan AJAX
                    fetch('{{ route('logout') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({})
                    }).then(response => {
                        if (response.ok) {
                            window.location.href = '{{ url('login') }}';
                        } else {
                            console.error('Logout failed');
                        }
                    }).catch(error => console.error('Logout error:', error));
                }
            });
        });
    </script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('static/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('static/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ asset('static/js/components/dark.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan URL saat ini
            var currentUrl = window.location.href;

            // Mencari setiap link di sidebar
            var sidebarItems = document.querySelectorAll('.sidebar-item a');
            sidebarItems.forEach(function(item) {
                var href = item.getAttribute('href');

                // Memeriksa apakah URL saat ini cocok dengan URL link sidebar
                if (currentUrl.includes(href)) {
                    // Menambahkan kelas active pada elemen parent dari link yang cocok
                    item.closest('.sidebar-item').classList.add('active');

                    // Jika elemen memiliki submenu, juga tambahkan kelas active pada elemen submenu-nya
                    var parentSubmenu = item.closest('.has-sub');
                    if (parentSubmenu) {
                        parentSubmenu.classList.add('active');
                    }
                }
            });
        });

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
                            option.textContent = jamKerja.jam_kerja + " Jam";
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
                        option.textContent = jamKerja.jam_kerja + " Jam";
                        selectJamKerja.appendChild(option);
                    });
                })
                .catch(error => console.error('Terjadi kesalahan:', error));
        });
    </script>


</body>

</html>
