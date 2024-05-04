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
                        <h3>Data Pegawai Mesin</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pegawai Mesin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('mesin/create') }}"><button class="btn btn-success">Tambah Data</button></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kehadiran</th>
                                    <th>Nomor Mesin</th>
                                    <th>Jam Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $msn)
                                    <tr>
                                        <td>{{ $msn->tb_pegawai->nama_pegawai }}</td>
                                        <td></td>
                                        <td>{{ $msn->mesin }}</td>
                                        <td>{{ $msn->tb_jam_kerja->jam_kerja }}</td>
                                        <td>
                                            <form action="{{ route('mesin.destroy', $msn->id_peg_mesin) }}" method="POST">
                                                <a href="{{ route('mesin.edit', $msn->id_peg_mesin) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit Mesin">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>
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
