<?php

namespace App\Http\Controllers;

use App\Models\TbKenek;
use App\Models\TbPegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KenekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TbKenek::all();
        $title = 'Hapus Kenek';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        return view('kenek/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('kenek/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbKenek::create([
            'id_pegawai' => $request->id_pegawai,
            'transport'  => $request->transport,
            'rit_angkutan'  => $request->rit_angkutan,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("kenek");
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
    public function edit(TbKenek $kenek)
    {
        $data["pegawaiExist"] = TbPegawai::find($kenek->id_pegawai);
        $data['pegawai'] = TbPegawai::all();
        return view('kenek/edit', compact('kenek'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbKenek $kenek)
    {
        $kenek->update([
            'id_pegawai' => $request->id_pegawai,
            'transport'  => $request->transport,
            'rit_angkutan'  => $request->rit_angkutan,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("kenek");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbKenek $kenek)
    {
        $kenek->delete();
        Alert::success("Success", "Data berhasil dihapus");
        return redirect("kenek");
    }
}
