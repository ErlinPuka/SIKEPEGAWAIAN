<!DOCTYPE html>
<html lang="en">
    <head>
        <title>palet</title>
        <link rel="Shortcut icon" href = "{{ asset('images/Logobaru.jpg') }}"alt="">
        <link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Absensi - CVIndahCemerlang</title>
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
                          <a href="/staf"  target="blank">Staf</a>
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
                    <h1>Absen Pegawai</h1>
                    <div class="user-info">
                        <img src="{{ asset('images/user.jpg')}}" alt="User Image">
                        <span>Selamat datang, <strong>Admin</strong></span>
                    </div>
                </header>
                <div class="company-info">
                    <!-- Main -->
                    <main class="main-container">
                        <div class="main-title">
                          <div class="home-content">

                            <h3>Absensi Karyawan</h3>
                            <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
                            {!! Form::label('date', 'Date: ' ) !!}
                                <div class="form-group input-group date">
                                    {!! Form::text('date', null, ['class' => 'form-control']) !!}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <script src="/js/moment.min.js"></script>
                                <script src="/js/bootstrap-datetimepicker.min.js"></script>
                                <script>
                                $function(){
                                    $(.date).datetimepicker({
                                     });
                                </script>
                            <table class="table-data">
                               <thead>
                                <tr style="background-color:#696969">
                                  <th style="width: 20%">Id Pegawai</th>
                                  <th style="width: 20%">Nama</th>
                                  <th style="width: 20%">Hadir</th>
                                  <th style="width: 20%">Izin</th>
                                  <th style="width: 20%">Sakit</th>
                                </tr>
                               </thead>
                               <tbody>
                                <tr>
                                   <td>KD121</td>
                                   <td>Mariam</td>
                                   <td><form><label><input name="check" value="1" type="checkbox"></label></form></td>
                                   <td><form><label><input name="check" value="1" type="checkbox"></label></form></td>
                                   <td><form><label><input name="check" value="1" type="checkbox"></label></form></td>
                                </tr>
                                <tr>
                                    <td>KD122</td>
                                    <td>Cusmaini</td>
                                    <td><form><label><input name="check" value="1" type="checkbox"></label></form></td>
                                   <td><form><label><input name="check" value="1" type="checkbox"></label></form></td>
                                   <td><form><label><input name="check" value="1" type="checkbox"></label></form></td>
                               </tr>
                               </tbody>
                            </table>
                           </div>
                           <div class="col card-header text-right">
                            <button type="button" class="btn btn-primary plus" data-bs-toggle="pegawai" data-bs-target="#absenpegawai">
                                <span data-feather="plus"></span>
                                Simpan Data
                            </button>
                        </div>
                      </main>
                      <!-- End Main -->
                </div> 
            </div>
        </div>
    </body>
</html>