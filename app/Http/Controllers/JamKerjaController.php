<?php

namespace App\Http\Controllers;

use App\Models\TbJamKerja;
use App\Models\TbPegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JamKerjaController extends Controller
{
    public function getJamKerjaByPegawai($pegawaiId)
    {
        $jamKerja = TbJamKerja::where('id_pegawai', $pegawaiId)->get();
        return response()->json($jamKerja);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Hapus Staf';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);

        $data = TbJamKerja::all();

        return view('jam_kerja.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('jam_kerja/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbJamKerja::create([
            'id_pegawai' => $request->id_pegawai,
            'jam_kerja'  => $request->jam_kerja,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("jam_kerja");
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
    public function edit(TbJamKerja $jam_kerja)
    {
        $data["pegawaiExist"] = TbPegawai::find($jam_kerja->id_pegawai);
        $data['pegawai'] = TbPegawai::all();
        return view('jam_kerja/edit', compact('jam_kerja'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbJamKerja $jam_kerja)
    {
        $jam_kerja->update([
            'id_pegawai' => $request->id_pegawai,
            'jam_kerja'  => $request->jam_kerja,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("jam_kerja");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbJamKerja $jam_kerja)
    {
        $jam_kerja->delete();
        Alert::success("Success", "Data berhasil dihapus");

        return redirect("jam_kerja");
    }
}
