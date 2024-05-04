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
                        <h3>Edit Data Presensi</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Data Presensi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical"
                                        action="{{ route('presensi.update', $presensi->id_presensi) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <input type="hidden" name="id_pegawai" value="{{ $presensi->id_pegawai }}">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Nama</label>
                                                        <input type="text" id="email-id-vertical" class="form-control"
                                                            placeholder="Nama Pegawai" name="nama_pegawai"
                                                            value="{{ $presensi->tb_pegawai->nama_pegawai }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-vertical">Status Presensi</label>
                                                        <select class="form-control" name="status_presensi"
                                                            id="status_presensi" required>
                                                            <option value="Hadir"
                                                                {{ $presensi->status_presensi == 'hadir' ? 'selected' : '' }}>
                                                                Hadir
                                                            </option>
                                                            <option value="Sakit"
                                                                {{ $presensi->status_presensi == 'sakit' ? 'selected' : '' }}>
                                                                Sakit
                                                            </option>
                                                            <option value="Izin"
                                                                {{ $presensi->status_presensi == 'izin' ? 'selected' : '' }}>
                                                                Izin
                                                            </option>
                                                            <option value="Alpa"
                                                                {{ $presensi->status_presensi == 'alpa' ? 'selected' : '' }}>
                                                                Alpa
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-vertical">Tanggal</label>
                                                        <input type="date" id="email-id-vertical" class="form-control"
                                                            name="tanggal" value="{{ substr($presensi->tanggal, 0, 10) }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
