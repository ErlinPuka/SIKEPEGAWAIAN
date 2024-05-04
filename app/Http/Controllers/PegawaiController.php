<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TbPegawai::all();
        $title = 'Hapus Pegawai';
        $text = "Apakah anda yakin untuk hapus?";
        confirmDelete($title, $text);
        return view('pegawai/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TbPegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'no_telp'  => $request->no_telp,
            'email'  => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("pegawai");
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
    public function edit(TbPegawai $pegawai)
    {
        return view('pegawai/edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbPegawai $pegawai)
    {
        $data = [
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'no_telp'  => $request->no_telp,
            'email'  => $request->email,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $pegawai->update($data);
        Alert::success("Success", "Data berhasil disimpan");
        return redirect("pegawai");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbPegawai $pegawai)
    {
        $pegawai->delete();
        Alert::success("Success", "Data berhasil dihapus");

        return redirect("pegawai");
    }
}
