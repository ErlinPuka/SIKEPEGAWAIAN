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
                        <h3>Detail Penggajian</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('penggajian') }}">Penggajian</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Penggajian</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Detail Penggajian - {{ $penggajianDetail->nama_pegawai }}</h4>
                            <a href="{{ url('penggajian/export-pdf/' . $penggajianDetail->id_penggajian) }}"
                                class="btn btn-primary">Export to PDF</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Periode: {{ date('F Y', strtotime($penggajianDetail->bulan_penggajian)) }}</p>
                        <p>Tanggal Dibayar: {{ date('d F Y', strtotime($penggajianDetail->tanggal_dibayar)) }}</p>
                        <br>
                        <p>ID Penggajian: {{ $penggajianDetail->id_penggajian }}</p>
                        <p>Nama Pegawai: {{ $penggajianDetail->nama_pegawai }}</p>
                        <p>Tipe: {{ $penggajianDetail->tipe }}</p>
                        <p>Jenis Penggajian: {{ $penggajianDetail->jenis_penggajian }}</p>
                        <p>Jumlah Kehadiran: {{ $penggajianDetail->jumlah_kehadiran }}</p>
                        <p>Total Gaji: Rp{{ number_format($penggajianDetail->total_gaji, 0, ',', '.') }}</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
