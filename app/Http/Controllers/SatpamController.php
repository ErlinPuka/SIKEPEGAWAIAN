<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use App\Models\TbSatpam;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SatpamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TbSatpam::all();
        $title = 'Hapus Satpam';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        return view('satpam/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pegawai'] = TbPegawai::all();
        return view('satpam/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbSatpam::create([
            'id_pegawai' => $request->id_pegawai,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("satpam");
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
    public function edit(TbSatpam $satpam)
    {
        $data["pegawaiExist"] = TbPegawai::find($satpam->id_pegawai);
        $data['pegawai'] = TbPegawai::all();
        return view('satpam/edit', compact('satpam'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbSatpam $satpam)
    {
        $satpam->update([
            'id_pegawai' => $request->id_pegawai,
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("satpam");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbSatpam $satpam)
    {
        $satpam->delete();
        Alert::success("Success", "Data berhasil dihapus");

        return redirect("satpam");
    }
}
