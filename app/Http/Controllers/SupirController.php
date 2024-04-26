<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use App\Models\TbSupir;
use Illuminate\Http\Request;

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
            'transport'  => $request->transport,
            'rit_angkutan'  => $request->rit_angkutan,
        ]);
        return redirect("supir")->with("message", "Data berhasil disimpan");
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
        return redirect("supir")->with("message", "Data berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( TbSupir $supir)
    {
        $supir->delete();
        return redirect("supir")->with("message", "Data berhasil dihapus");
    }
}
