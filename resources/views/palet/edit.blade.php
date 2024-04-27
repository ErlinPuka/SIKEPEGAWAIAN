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
                        <h3>Edit Data Palet</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Data Palet</li>
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
                                    <form class="form form-vertical" action="{{ route('palet.update', $palet->id_palet) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Nama</label>
                                                        <select class="form-control" name="id_pegawai" id="id_pegawai"
                                                            required>
                                                            <option value="" selected>Pilih Pegawai</option>
                                                            @foreach ($pegawai as $k)
                                                                <option
                                                                    {{ $k->id_pegawai == $pegawaiExist->id_pegawai ? 'selected' : '' }}
                                                                    value="{{ $k->id_pegawai }}">
                                                                    {{ $k->nama_pegawai }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-vertical">Jumlah Palet</label>
                                                        <input type="text" id="email-id-vertical" class="form-control"
                                                            placeholder="Jumlah Palet" name="jumlah_palet"
                                                            value="{{ $palet->jumlah_palet }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="contact-info-vertical">Jam Kerja</label>
                                                        <select class="form-control" name="id_jam_kerja" id="id_jam_kerja"
                                                            required>
                                                            <option value="" selected>Pilih Jam Kerja</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-vertical">Jenis Palet</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_palet" id="jenis_palet1" value="1"
                                                                {{ $palet->jenis_palet == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="jenis_palet1">
                                                                Palet 1
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_palet" id="jenis_palet2" value="2"
                                                                {{ $palet->jenis_palet == 2 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="jenis_palet2">
                                                                Palet 2
                                                            </label>
                                                        </div>
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
