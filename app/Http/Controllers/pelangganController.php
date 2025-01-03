<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use Illuminate\Http\Request;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getData = pelanggan::paginate();
        return view('Pelanggan.pelanggan', compact(
            'getData'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pelanggan.add-pelanggan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valueData = $request->validate([
            'nama_pelanggan' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ], [
            'nama_pelanggan.required' => 'Data Wajib diisi!!!',
            'telp.required' => 'Data Wajib diisi!!!',
            'jenis_kelamin.required' => 'Data Wajib diisi!!!',
            'alamat.required' => 'Data Wajib diisi!!!',
            'kota.required' => 'Data Wajib diisi!!!',
            'provinsi.required' => 'Data Wajib diisi!!!',
        ]);

        pelanggan::create($valueData);

        return redirect('/pelanggan')->with(
            'message',
            '' . $request->nama_pelanggan . ' berhasil terdaftar' 
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $getData = pelanggan::find($id);
        // dd($getData);
        return view('Pelanggan.edit-pelanggan', compact(    
            'getData'
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valueData = $request->validate([
            'nama_pelanggan' => 'required',
            'telp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
        ], [
            'nama_pelanggan.required' => 'Data Wajib diisi!!!',
            'telp.required' => 'Data Wajib diisi!!!',
            'jenis_kelamin.required' => 'Data Wajib diisi!!!',
            'alamat.required' => 'Data Wajib diisi!!!',
            'kota.required' => 'Data Wajib diisi!!!',
            'provinsi.required' => 'Data Wajib diisi!!!',
        ]);

        $updatePelanggan = pelanggan::find($id);
        $updatePelanggan->nama_pelanggan = $request->nama_pelanggan;
        $updatePelanggan->telp = $request->telp;
        $updatePelanggan->jenis_kelamin = $request->jenis_kelamin;
        $updatePelanggan->alamat = $request->alamat;
        $updatePelanggan->kota = $request->kota;
        $updatePelanggan->provinsi = $request->provinsi;
        $updatePelanggan->save();
        // dd($updatePelanggan);

        return redirect('/pelanggan')->with(
            'message', 
            'Data pelanggan ' . $request->nama_pelanggan . ' Berhasil diperbaharui'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = pelanggan::find($id);
        $data->delete();

        return redirect()->back()->with(
            'message',
            'Data pelanggan ' . $data->nama_pelanggan . ' berhasil dihapus'
        );
    }
}
