<!DOCTYPE html>
<html>

<head>
    <title>Slip Gaji {{ $penggajianDetail->nama_pegawai }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .total {
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 class="title">Slip Gaji - {{ $penggajianDetail->nama_pegawai }}</h2>
            <h3 class="subtitle">Periode - {{ date('F Y', strtotime($penggajianDetail->bulan_penggajian)) }}</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal Dibayar:</th>
                    <td>{{ date('d F Y', strtotime($penggajianDetail->tanggal_dibayar)) }}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>#</th>
                    <th>ID Penggajian</th>
                    <th>Nama Pegawai</th>
                    <th>Tipe Pegawai</th>
                    <th>Jenis Penggajian</th>
                    <th>Jumlah Kehadiran</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>{{ $penggajianDetail->id_penggajian }}</td>
                    <td>{{ $penggajianDetail->nama_pegawai }}</td>
                    <td>{{ $penggajianDetail->tipe }}</td>
                    <td>{{ $penggajianDetail->jenis_penggajian }}</td>
                    <td>{{ $penggajianDetail->jumlah_kehadiran }} hari</td>
                </tr>
            </tbody>
        </table>
        <div class="total">Total Gaji: Rp{{ number_format($penggajianDetail->total_gaji, 0, ',', '.') }}</div>
    </div>
</body>

</html>
