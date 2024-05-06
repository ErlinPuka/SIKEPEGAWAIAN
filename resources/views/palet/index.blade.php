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
                        <h3>Data Palet</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Palet</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('palet/create') }}"><button class="btn btn-success">Tambah Data</button></a>
                    </div>
                    <div class="card-body">
                        <h5>Data Palet 1</h5>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jumlah Palet</th>
                                    <th>Jam Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['palet1'] as $plt1)
                                    <tr>
                                        <td>{{ $plt1->tb_pegawai->nama_pegawai }}</td>
                                        <td>{{ $totalHariHadir1[$plt1->id_pegawai] }}</td>
                                        <td>{{ $plt1->jumlah_palet }}</td>
                                        <td>{{ $plt1->tb_jam_kerja->jam_kerja }}</td>
                                        <td>
                                            <a href="{{ route('palet.edit', $plt1->id_palet) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit Palet">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('palet.destroy', $plt1->id_palet) }}"
                                                class="text-secondary font-weight-bold text-xs" data-confirm-delete="true">
                                                <button class="btn btn-danger" type="button" data-confirm-delete="true">
                                                    <i class="bi bi-trash" data-confirm-delete="true"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h5>Data Palet 2</h5>
                        <table class="table table-striped" id="table2">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kehadiran</th>
                                    <th>Jumlah Palet</th>
                                    <th>Jam Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['palet2'] as $plt1)
                                    <tr>
                                        <td>{{ $plt1->tb_pegawai->nama_pegawai }}</td>
                                        <td>{{ $totalHariHadir2[$plt1->id_pegawai] }}</td>
                                        <td>{{ $plt1->jumlah_palet }}</td>
                                        <td>{{ $plt1->tb_jam_kerja->jam_kerja }}</td>
                                        <td>
                                            <a href="{{ route('palet.edit', $plt1->id_palet) }}"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit Palet">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('palet.destroy', $plt1->id_palet) }}"
                                                class="text-secondary font-weight-bold text-xs" data-confirm-delete="true">
                                                <button class="btn btn-danger" type="button" data-confirm-delete="true">
                                                    <i class="bi bi-trash" data-confirm-delete="true"></i>
                                                </button>
                                            </a>
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
