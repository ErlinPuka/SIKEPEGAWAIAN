<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Entry Data Staf</title>
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
                <h1>Data Pegawai</h1>
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
                        {{-- <div class="row"> --}}
                          <div class="col-md-12">
                            <div class="card card-primary">
                              <div class="card-header" style="background-color:  #1d528a"> 
                                <h3 class="card-title">Input Employee</h3>
                  
                                <div class="card-tools">
                                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                              </div>
                
                              <div class="card-body">
                        <form action="employee-proses" method="post">
                          {{  csrf_field() }}
                                <div class="form-group">
                                  <label for="inputName">ID Pegawai</label>
                                  <input class="input" type="text" name="id_pegawai" id="id_pegawai" placeholder="ID Pegawai" />
                                </div>
                                <div class="form-group">
                          <label for="inputName">Nama Pegawai</label>
                          <input class="input" type="text" name="nama" id="nama" placeholder="Nama Pegawai" />
                          </div>
                
                                <div class="form-group">
                          <label for="inputName">Divisi</label>
                          <input class="input" type="text" name="divisi" id="divisi" placeholder="Divisi" />
                          </div>
                
                                <div class="form-group">
                          <label for="inputName">No HP</label>
                          <input class="input" type="text" name="no_hp" id="no_hp" placeholder="NO HP" />
                          </div>
                
                          <div class="form-group">
                          <label for="inputName">ID Supir</label>
                          <input class="input" type="text" name="id_supir" id="id_supir" placeholder=" ID Supir" />
                          </div>
                          
                          <div class="form-group">
                          <button type="submit" class="btn btn-success" name="simpan" style="background-color: #1d528a; color: white;">
                            Simpan
                          </button>
                          </div>
                          </button>
                              </div>
                            </div>
                          </div>
                  </div>
                  </main>
                  <!-- End Main -->
            </div> 
        </div>
    </div>
   <section class="home-section">
	<nav>
	  <div class="sidebar-button">
		<i class="bx bx-menu sidebarBtn"></i>
	  </div>
	</nav>
    <div class="home-content">
        {{-- <div class="row"> --}}
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header" style="background-color:  #1d528a"> 
                <h3 class="card-title">Input Employee</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
				<form action="employee-proses" method="post">
					{{  csrf_field() }}
                <div class="form-group">
                  <label for="inputName">ID Pegawai</label>
                  <input class="input" type="text" name="id_pegawai" id="id_pegawai" placeholder="ID Pegawai" />
                </div>
                <div class="form-group">
					<label for="inputName">Nama Pegawai</label>
					<input class="input" type="text" name="nama" id="nama" placeholder="Nama Pegawai" />
				  </div>

                <div class="form-group">
					<label for="inputName">Divisi</label>
					<input class="input" type="text" name="divisi" id="divisi" placeholder="Divisi" />
				  </div>

                <div class="form-group">
					<label for="inputName">No HP</label>
					<input class="input" type="text" name="no_hp" id="no_hp" placeholder="NO HP" />
				  </div>

				  <div class="form-group">
					<label for="inputName">ID Supir</label>
					<input class="input" type="text" name="id_supir" id="id_supir" placeholder=" ID Supir" />
				  </div>
				  
				  <div class="form-group">
					<button type="submit" class="btn btn-success" name="simpan" style="background-color: #1d528a; color: white;">
						Simpan
					</button>
				  </div>
				  </button>
              </div>
            </div>
          </div>
	</div>
   </section>
   <script>
	let sidebar = document.querySelector(".sidebar");
	let sidebarBtn = document.querySelector(".sidebarBtn");
	   sidebarBtn.onclick = function () {
		sidebar.classList.toggle("active");
		   if (sidebar.classList.contains("active")) {
			sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
			};
  </script>
</body>
</html>
