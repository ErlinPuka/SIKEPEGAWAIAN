@extends('template')
@section('content')
    <div class="content">
        <header>
            <div class="toggle-sidebar"><i class="fas fa-bars"></i></div>
            <h1>Data Pegawai</h1>
            <div class="user-info">
                <img src="{{ asset('images/user.jpg') }}" alt="User Image">
                <span>Selamat datang, <strong>Admin</strong></span>
            </div>
        </header>
        <div class="company-info">
            <!-- Main -->
            <main class="main-container">
                <div class="main-title">
                    <div class="home-content">

                        <h3>DATA PALET II</h3>
                        <button type="button" class="btn btn-tambah">
                            <a href="/admin-entry">Tambah Data</a>
                        </button>
                        <table class="table-data">
                            <thead>
                                <tr style="background-color:#696969">
                                    <th style="width: 20%">Id Pegawai</th>
                                    <th style="width: 20%">Nama</th>
                                    <th style="width: 20%">Jenis Kelamin</th>
                                    <th style="width: 20%">Alamat</th>
                                    <th style="width: 20%">Nomer Telpon</th>
                                    <th style="width: 20%">Email</th>
                                    <th style="width: 20%">Jabatan</th>
                                    <th style="width: 20%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>KD121</td>
                                    <td>Mariam</td>
                                    <td>Perempuan</td>
                                    <td>Jl.Suhat</td>
                                    <td>0897654321</td>
                                    <td>mariamyam@gmail.com</td>
                                    <td>Staf 1</td>
                                    <td><a href="">Edit</a> | <a href="">Hapus</a></td>
                                </tr>
                                <tr>
                                    <td>KD122</td>
                                    <td>Cusmaini</td>
                                    <td>Perempuan</td>
                                    <td>Jl.Suhat</td>
                                    <td>0897654322</td>
                                    <td>cusmainicus@gmail.com</td>
                                    <td>Staf 2</td>
                                    <td><a href="">Edit</a> | <a href="">Hapus</a></td>
                                </tr>
                                <tr>
                                    <td>KD121</td>
                                    <td>Mariam</td>
                                    <td>Perempuan</td>
                                    <td>Jl.Suhat</td>
                                    <td>0897654321</td>
                                    <td>mariamyam@gmail.com</td>
                                    <td>Staf 1</td>
                                    <td><a href="">Edit</a> | <a href="">Hapus</a></td>
                                </tr>
                                <tr>
                                    <td>KD121</td>
                                    <td>Mariam</td>
                                    <td>Perempuan</td>
                                    <td>Jl.Suhat</td>
                                    <td>0897654321</td>
                                    <td>mariamyam@gmail.com</td>
                                    <td>Staf 1</td>
                                    <td><a href="">Edit</a> | <a href="">Hapus</a></td>
                                </tr>
                                <tr>
                                    <td>KD121</td>
                                    <td>Mariam</td>
                                    <td>Perempuan</td>
                                    <td>Jl.Suhat</td>
                                    <td>0897654321</td>
                                    <td>mariamyam@gmail.com</td>
                                    <td>Staf 1</td>
                                    <td><a href="">Edit</a> | <a href="">Hapus</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </main>
            <!-- End Main -->
        </div>
    </div>
@endsection
