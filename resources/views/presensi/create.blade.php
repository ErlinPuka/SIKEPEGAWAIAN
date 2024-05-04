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
                        <h3>Data Presensi</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Presensi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <form action="{{ route('presensi.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    value="{{ date('Y-m-d') }}">
                            </div>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Status Presensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $pgw)
                                        <tr>
                                            <td>{{ $pgw->nama_pegawai }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="presensi[{{ $pgw->id_pegawai }}]" value="Hadir">
                                                        <label class="form-check-label">Hadir</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="presensi[{{ $pgw->id_pegawai }}]" value="Sakit">
                                                        <label class="form-check-label">Sakit</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="presensi[{{ $pgw->id_pegawai }}]" value="Izin">
                                                        <label class="form-check-label">Izin</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="presensi[{{ $pgw->id_pegawai }}]" value="Alpa">
                                                        <label class="form-check-label">Alpa</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
