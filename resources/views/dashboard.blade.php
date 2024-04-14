<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <link rel="Shortcut icon" href = "{{ asset('images/Logobaru.jpg') }}"alt="">
        <link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - CVIndahCemerlang</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <nav class="sidebar">
                <div class="logo">
                    <img src="{{ asset('images/Logobaru.jpg') }}" alt="Logo Perusahaan" style="width: 80px; height: auto;">

                </div>
                <ul>
                    <li><a href="/dashboard" class="active"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-users"></i> <span>Pegawai</span></a></button>
                        <div class="dropdown-content">
                          <a href="/staf"  target="/staf">Staf</a>
                          <a href="/supir" target="blank">Supir</a>
                          <a href="/palet" target="blank">Palet</a>
                          <a href="/mesin" target="blank">Mesin</a>
                          <a href="/kenek" target="blank">Kenek</a>
                          <a href="/satpam"target="blank">Satpam</a>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-users"></i> <span>Penggajian</span></a></button>
                        <div class="dropdown-content">
                          <a href="/datapegawai" target="blank">Data Pegawai</a>
                          <a href="/jampegawai"  target="blank">Jam Kerja</a>
                        </div>
                      </div>
                      <li><a href="/absen"><i class="fas fa-cog"></i> <span>Absensi Karyawan</span></a></li>
                    <li><a href="/pengaturan"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                </ul>
            </nav>
             <div class="content">
                <header>
                    <div class="toggle-sidebar"><i class="fas fa-bars"></i></div>
                    <h1>Dashboard</h1>
                    <div class="user-info">
                        <img src="{{ asset('images/user.jpg')}}" alt="User Image">
                        <span>Selamat datang, <strong>Admin</strong></span>
                    </div>
                </header>
                <div class="company-info">
              
                <div class="company-info mt-4 p-4 bg-light rounded shadow">
                  <div class="d-flex align-items-center">
                    <img class="rounded mr-3" src="company-photo.jpg" alt="Foto Perusahaan" width="100" height="100">
                    <div>
                      <h2 class="mb-1">CV Indah Cemerlang</h2>
                      <p class="mb-0"><i class="fas fa-map-marker-alt mr-2"></i> Jalan Protokol Baturetno 261-156, Damean, Taman Harjo, Singosari</p>
                      <p class="mb-0"><i class="fas fa-phone mr-2"></i> 085646623447</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </body>
</html>