<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use App\Models\TbPresensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TbPresensi::all();
        $title = 'Hapus Presensi';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        return view('presensi/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('presensi/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'presensi.*' => 'required|in:Hadir,Sakit,Izin,Alpa',
        ]);
        foreach ($validatedData['presensi'] as $pegawaiId => $statusPresensi) {
            $presensi = new TbPresensi();
            $presensi->id_pegawai = $pegawaiId;
            $presensi->status_presensi = $statusPresensi;
            $presensi->tanggal = $validatedData['tanggal'];
            $presensi->save();
        }
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("presensi");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TbPresensi $presensi)
    {
        return view('presensi/edit', compact('presensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbPresensi $presensi)
    {
        $presensi->update([
            'id_pegawai' => $request->id_pegawai,
            'status_presensi' => $request->status_presensi,
            'tanggal'  => $request->tanggal,
        ]);
        Alert::success("Success", "Data berhasil disimpan");
        return redirect("presensi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbPresensi $presensi)
    {
        $presensi->delete();
        Alert::success("Success", "Data berhasil dihapus");
        return redirect("presensi");
    }
}
