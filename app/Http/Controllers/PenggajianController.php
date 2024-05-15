<?php

namespace App\Http\Controllers;

use App\Models\TbKenek;
use App\Models\TbPegawai;
use App\Models\TbPresensi;
use App\Models\TbSupir;
use App\Models\TbPalet;
use App\Models\TbPegMesin;
use App\Models\TbPenggajian;
use App\Models\TbSatpam;
use App\Models\TbStaf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PenggajianController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Hapus Pegawai';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        $tanggal_penggajian = $request->input('tanggal_penggajian', Carbon::now()->format('Y-m'));

        try {
            list($year, $month) = explode('-', $tanggal_penggajian);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Invalid date format in tanggal_penggajian.']);
        }

        $data = TbPegawai::leftJoin('tb_jam_kerja', 'tb_pegawai.id_pegawai', '=', 'tb_jam_kerja.id_pegawai')
            ->select('tb_pegawai.*', 'tb_jam_kerja.*')
            ->get();

        foreach ($data as $pegawai) {
            $pegawai->tipe = $this->checkPegawaiType($pegawai->id_pegawai);
            $pegawai->jenis_penggajian = ($pegawai->tipe === 'Supir' || $pegawai->tipe === 'Palet') ? 'Harian' : 'Bulanan';
            $pegawai->jumlah_kehadiran = $this->getJumlahKehadiran($pegawai->id_pegawai, $year, $month);
            $pegawai->total_gaji = $this->hitungGaji($pegawai, $year, $month);
            $pegawai->sudah_digaji = $this->checkSudahDigaji($pegawai->id_pegawai, $year, $month);
            if ($pegawai->sudah_digaji) {
                $penggajian = TbPenggajian::where('id_pegawai', $pegawai->id_pegawai)
                    ->whereYear('bulan_penggajian', $year)
                    ->whereMonth('bulan_penggajian', $month)
                    ->first();

                $pegawai->id_penggajian = $penggajian ? $penggajian->id_penggajian : null;
            }
        }

        return view('penggajian.index', compact('data', 'tanggal_penggajian'));
    }

    private function checkPegawaiType($idPegawai)
    {
        if (TbStaf::where('id_pegawai', $idPegawai)->exists()) {
            return 'Staf';
        } elseif (TbSupir::where('id_pegawai', $idPegawai)->exists()) {
            return 'Supir';
        } elseif (TbPalet::where('id_pegawai', $idPegawai)->exists()) {
            return 'Palet';
        } elseif (TbPegMesin::where('id_pegawai', $idPegawai)->exists()) {
            return 'Pegawai Mesin';
        } elseif (TbKenek::where('id_pegawai', $idPegawai)->exists()) {
            return 'Kenek';
        } elseif (TbSatpam::where('id_pegawai', $idPegawai)->exists()) {
            return 'Satpam';
        } else {
            return 'Tidak Diketahui';
        }
    }

    private function getJumlahKehadiran($idPegawai, $year, $month)
    {
        return TbPresensi::where('id_pegawai', $idPegawai)
            ->where('status_presensi', 'Hadir')
            ->whereYear('tanggal', '=', $year)
            ->whereMonth('tanggal', '=', $month)
            ->count();
    }

    private function hitungGaji($pegawai, $year, $month)
    {
        $totalGaji = 0;
        $jumlahTidakMasuk = $this->getJumlahTidakMasuk($pegawai->id_pegawai, $year, $month);

        if ($pegawai->jumlah_kehadiran) {
            if ($pegawai->jenis_penggajian === 'Harian') {
                if ($pegawai->tipe === 'Supir') {
                    $dataSupir = TbSupir::where('id_pegawai', $pegawai->id_pegawai)->first();
                    $totalGaji = $dataSupir->rit_angkutan * 100000;
                } elseif ($pegawai->tipe === 'Palet') {
                    $totalGaji = $pegawai->jam_kerja * 20000;
                }
                $totalGaji *= $pegawai->jumlah_kehadiran;
            } elseif ($pegawai->jenis_penggajian === 'Bulanan') {
                if ($pegawai->tipe === 'Staf') {
                    $totalGaji = 3000000 - ($jumlahTidakMasuk * 50000);
                } else{
                    $totalGaji *= $pegawai->jumlah_kehadiran;
                }
            }
        }

        return $totalGaji;
    }

    private function checkSudahDigaji($idPegawai, $year, $month)
    {
        return TbPenggajian::where('id_pegawai', $idPegawai)
            ->whereYear('bulan_penggajian', '=', $year)
            ->whereMonth('bulan_penggajian', '=', $month)
            ->exists();
    }

    private function getJumlahTidakMasuk($idPegawai, $year, $month)
    {
        $daysInMonth = Carbon::createFromDate($year, $month)->daysInMonth;
        $jumlahHadir = $this->getJumlahKehadiran($idPegawai, $year, $month);

        return $daysInMonth - $jumlahHadir;
    }

    public function store(Request $request)
    {
        $penggajian = new TbPenggajian();
        $penggajian->id_pegawai = $request->id_pegawai;
        $penggajian->jenis_penggajian = $request->jenis_penggajian;
        $penggajian->total_gaji = $request->total_gaji;
        $penggajian->tanggal_dibayar = Carbon::now()->format('Y-m-d');
        $penggajian->bulan_penggajian = Carbon::createFromFormat('Y-m', $request->tanggal_penggajian)->format('Y-m-01');
        $penggajian->status = 1;

        $penggajian->save();

        return redirect()->back()->with('success', 'Data Gaji berhasil disimpan');
    }

    public function show($id_penggajian)
    {
        $penggajianDetail = TbPenggajian::join('tb_pegawai', 'tb_penggajian.id_pegawai', '=', 'tb_pegawai.id_pegawai')
            ->join('tb_jam_kerja', 'tb_penggajian.id_pegawai', '=', 'tb_jam_kerja.id_pegawai')
            ->select('tb_pegawai.*', 'tb_jam_kerja.*', 'tb_penggajian.*')
            ->where('tb_penggajian.id_penggajian', '=', $id_penggajian)
            ->first();

        try {
            list($year, $month) = explode('-', $penggajianDetail->bulan_penggajian);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Invalid date format in bulan_penggajian.']);
        }

        if ($penggajianDetail) {
            $penggajianDetail->tipe = $this->checkPegawaiType($penggajianDetail->id_pegawai);
            $penggajianDetail->jenis_penggajian = ($penggajianDetail->tipe === 'Supir' || $penggajianDetail->tipe === 'Palet') ? 'Harian' : 'Bulanan';
            $penggajianDetail->jumlah_kehadiran = $this->getJumlahKehadiran($penggajianDetail->id_pegawai, $year, $month);
            $penggajianDetail->total_gaji = $this->hitungGaji($penggajianDetail, $year, $month);
            $penggajianDetail->sudah_digaji = $this->checkSudahDigaji($penggajianDetail->id_pegawai, $year, $month);
        }

        return view('penggajian.detail', ['penggajianDetail' => $penggajianDetail]);
    }

    public function exportPdf($id_penggajian)
    {
        $penggajianDetail = TbPenggajian::join('tb_pegawai', 'tb_penggajian.id_pegawai', '=', 'tb_pegawai.id_pegawai')
            ->join('tb_jam_kerja', 'tb_pegawai.id_pegawai', '=', 'tb_jam_kerja.id_pegawai')
            ->select('tb_pegawai.*', 'tb_jam_kerja.*', 'tb_penggajian.*')
            ->where('tb_penggajian.id_penggajian', '=', $id_penggajian)
            ->first();

        if ($penggajianDetail) {
            try {
                list($year, $month) = explode('-', $penggajianDetail->bulan_penggajian);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => 'Invalid date format in bulan_penggajian.']);
            }

            $penggajianDetail->tipe = $this->checkPegawaiType($penggajianDetail->id_pegawai);
            $penggajianDetail->jenis_penggajian = ($penggajianDetail->tipe === 'Supir' || $penggajianDetail->tipe === 'Palet') ? 'Harian' : 'Bulanan';
            $penggajianDetail->jumlah_kehadiran = $this->getJumlahKehadiran($penggajianDetail->id_pegawai, $year, $month);
            $penggajianDetail->total_gaji = $this->hitungGaji($penggajianDetail, $year, $month);
            $penggajianDetail->sudah_digaji = $this->checkSudahDigaji($penggajianDetail->id_pegawai, $year, $month);
        }

        $pdf = PDF::loadView('penggajian.report', ['penggajianDetail' => $penggajianDetail]);
        return $pdf->download('gaji-.pdf');
    }
}
