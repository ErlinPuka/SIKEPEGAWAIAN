<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use App\Models\TbPegMesin;
use App\Models\TbPresensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Hapus Pegawai Mesin';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);

        $data = TbPegMesin::all();
        $dataPresensi = TbPresensi::all();

        $totalHariHadir = [];
        foreach ($data as $mesin) {
            $totalHariHadir[$mesin->id_pegawai] = TbPresensi::where('id_pegawai', $mesin->id_pegawai)
                ->where('status_presensi', 'Hadir')
                ->distinct('tanggal')
                ->count('tanggal');
        }

        return view('mesin/index', compact('data', 'totalHariHadir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('mesin/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbPegMesin::create([
            'id_pegawai' => $request->id_pegawai,
            'id_jam_kerja' => $request->id_jam_kerja,
            'mesin'  => $request->mesin,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("mesin");
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
    public function edit(TbPegMesin $mesin)
    {
        $data["pegawaiExist"] = TbPegawai::find($mesin->id_pegawai);
        $data['pegawai'] = TbPegawai::all();
        return view('mesin/edit', compact('mesin'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbPegMesin $mesin)
    {
        $mesin->update([
            'id_pegawai' => $request->id_pegawai,
            'id_jam_kerja' => $request->id_jam_kerja,
            'mesin'  => $request->mesin,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("mesin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbPegMesin $mesin)
    {
        $mesin->delete();
        Alert::success("Success", "Data berhasil dihapus");
        return redirect("mesin");
    }
}
