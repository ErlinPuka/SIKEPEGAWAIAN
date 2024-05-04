<?php

namespace App\Http\Controllers;

use App\Models\TbJamKerja;
use App\Models\TbPalet;
use App\Models\TbPegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['palet1'] = TbPalet::where('jenis_palet', '=', 1)->get();
        $data['palet2'] = TbPalet::where('jenis_palet', '=', 2)->get();
        $title = 'Hapus Palet';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        return view('palet/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('palet/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbPalet::create([
            'id_pegawai' => $request->id_pegawai,
            'id_jam_kerja' => $request->id_jam_kerja,
            'jumlah_palet'  => $request->jumlah_palet,
            'jenis_palet'  => $request->jenis_palet,
        ]);
        Alert::success("Success", "Data berhasil disimpan");
        return redirect("palet");
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
    public function edit(TbPalet $palet)
    {
        $data["pegawaiExist"] = TbPegawai::find($palet->id_pegawai);
        $data['pegawai'] = TbPegawai::all();
        return view('palet/edit', compact('palet'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbPalet $palet)
    {
        $palet->update([
            'id_pegawai' => $request->id_pegawai,
            'id_jam_kerja' => $request->id_jam_kerja,
            'jumlah_palet'  => $request->jumlah_palet,
            'jenis_palet'  => $request->jenis_palet,
        ]);
        Alert::success("Success", "Data berhasil disimpan");
        return redirect("palet");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbPalet $palet)
    {
        $palet->delete();
        Alert::success("Success", "Data berhasil dihapus");
        return redirect("palet");
    }
}
