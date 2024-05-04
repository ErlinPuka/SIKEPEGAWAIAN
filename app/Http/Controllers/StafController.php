<?php

namespace App\Http\Controllers;

use App\Models\TbJamKerja;
use App\Models\TbPegawai;
use App\Models\TbStaf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TbStaf::all();
        $title = 'Hapus Staf';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        return view('staf/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('staf/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbStaf::create([
            'id_pegawai' => $request->id_pegawai,
            'id_jam_kerja' => $request->id_jam_kerja,
            'jabatan'  => $request->jabatan,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("staf");
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
    public function edit(TbStaf $staf)
    {
        $data["pegawaiExist"] = TbPegawai::find($staf->id_pegawai);
        $data['pegawai'] = TbPegawai::all();
        return view('staf/edit', compact('staf'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbStaf $staf)
    {
        $staf->update([
            'id_pegawai' => $request->id_pegawai,
            'id_jam_kerja' => $request->id_jam_kerja,
            'jabatan'  => $request->jabatan,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("staf");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbStaf $staf)
    {
        $staf->delete();
        Alert::success("Success", "Data berhasil dihapus");

        return redirect("staf");

    }
}
