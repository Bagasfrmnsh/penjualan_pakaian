<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'nama_barang'=>'required',
            'stok'=>'required',
            'tanggal_masuk'=>'required',
            'harga'=>'required',
            'kategori'=>'required',
            'deskripsi'=>'required',
        ]);
        $barang = new Barang;
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
        return redirect()->route('pengelola.index')->with
        ('status', 'Produk Berhasil Ditambahkan');

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
            'nama_barang' => 'required',
            'stok' => 'required',
            'tanggal_masuk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',

        ]);

        $barang = Barang::findOrFail($id);
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

        return redirect()->route('pengelola.index');
    }
}
