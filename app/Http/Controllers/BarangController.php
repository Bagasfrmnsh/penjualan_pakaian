<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Alert;
use validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('admin.pengelola.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengelola.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
    $request->validate([
        'nama_barang'=>'required|max:2048',
        'stok'=>'required|numeric',
        'tanggal_masuk'=>'required',
        'harga'=>'required',
        'kategori'=>'required',
        'deskripsi'=>'required',
        
    ]);
        $barang = new Barang;
        $barang->kode_barang = mt_rand(1000, 9000);
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        $barang->tanggal_masuk = $request->tanggal_masuk;
        $barang->harga = $request->harga;
        $barang->kategori = $request->kategori;
        $barang->deskripsi = $request->deskripsi;
        if ($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $name = rand(1000, 9999)."".$request->gambar->getClientOriginalName();
            $image->move('image/barangs/', $name);
            $barang->gambar = $name;
        }
        $barang->save();
        return redirect()->route('pengelola.index')->with('status', 'Produk Berhasil ditambahkan');
        $barang->gambar = $request->gambar;
        $barang->save();    
        Alert::success('Good Job', 'Data berhasil ditambahkan');
        return redirect()->route('pengelola.index');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.pengelola.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.pengelola.edit', compact('barang'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required',
            'tanggal_masuk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',

        ]);

        $barang = Barang::findOrFail($id);
        $barang-> kode_barang = $request->kode_barang;
        $barang-> nama_barang = $request->nama_barang;
        $barang-> stok = $request->stok;
        $barang-> tanggal_masuk = $request->tanggal_masuk;
        $barang-> harga = $request->harga;
        $barang-> kategori = $request->kategori;
        $barang-> deskripsi = $request->deskripsi;
        $barang->save();
        return redirect()->route('pengelola.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();
        Alert::warning('Warning', 'Data tidak bisa dihapus');
        return redirect()->route('pengelola.index');

    //     if (!Barang::destroy($id)) {
    //         return redirect()->back();
    //     }
    //     Alert::success('Success', 'Data deleted successfully');
    //     return redirect()->route('barang.index');
    // }
}
}

