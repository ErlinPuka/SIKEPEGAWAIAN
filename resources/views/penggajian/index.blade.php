@extends('template')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Generate Gaji</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gaji</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ url('penggajian') }}" method="GET">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="tanggal_penggajian">Tanggal Penggajian</label>
                                    <input type="month" class="form-control" name="tanggal_penggajian"
                                        id="tanggal_penggajian"
                                        value="{{ isset($tanggal_penggajian) ? $tanggal_penggajian : date('Y-m') }}">
                                </div>
                                <div class="col-md-4 mb-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100">Get</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama Pegawai</th>
                                    <th>Tipe Pegawai</th>
                                    <th>Jam Kerja</th>
                                    <th>Jenis Penggajian</th>
                                    <th>Jumlah Kehadiran</th>
                                    <th>Gaji</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $pegawai)
                                    <tr>
                                        <td>{{ $pegawai->nama_pegawai }}</td>
                                        <td>{{ $pegawai->tipe }}</td>
                                        <td>{{ $pegawai->jam_kerja }} Jam</td>
                                        <td>{{ $pegawai->jenis_penggajian }}</td>
                                        <td>{{ $pegawai->jumlah_kehadiran }}</td>
                                        <td>Rp{{ number_format($pegawai->total_gaji, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($pegawai->total_gaji)
                                                @if ($pegawai->sudah_digaji)
                                                    <a href="{{ route('penggajian.show', $pegawai->id_penggajian) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Detail">
                                                        <button class="btn btn-warning" type="button">
                                                            Detail
                                                        </button>
                                                    </a>
                                                @else
                                                    <form action="{{ route('penggajian.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id_pegawai"
                                                            value="{{ $pegawai->id_pegawai }}">
                                                        <input type="hidden" name="jenis_penggajian"
                                                            value="{{ $pegawai->jenis_penggajian }}">
                                                        <input type="hidden" name="total_gaji"
                                                            value="{{ $pegawai->total_gaji }}">
                                                        <input type="hidden" name="tanggal_penggajian"
                                                            value="{{ request()->input('tanggal_penggajian', date('Y-m')) }}">
                                                        <button type="submit" class="btn btn-success">Bayar</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection
