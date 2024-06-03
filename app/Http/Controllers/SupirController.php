<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use App\Models\TbSupir;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TbSupir::all();
        $title = 'Hapus Supir';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        return view('supir/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('supir/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbSupir::create([
            'id_pegawai' => $request->id_pegawai,
            'id_jam_kerja'=> $request->id_jam_kerja,
            'transport'  => $request->transport,
            'rit_angkutan'  => $request->rit_angkutan,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("supir");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TbSupir $supir)
    {
        $data["pegawaiExist"] = TbPegawai::find($supir->id_pegawai);
        $data['pegawai'] = TbPegawai::all();
        return view('supir/edit', compact('supir'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbSupir $supir)
    {
        $supir->update([
            'id_pegawai' => $request->id_pegawai,
            'transport'  => $request->transport,
            'rit_angkutan'  => $request->rit_angkutan,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("supir");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbSupir $supir)
    {
        $supir->delete();
        Alert::success("Success", "Data berhasil dihapus");

        return redirect("supir");
    }
}
