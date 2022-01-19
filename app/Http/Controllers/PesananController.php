<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::with('barang')->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.pesanan.create', compact('barang'));
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
            'pemesan'=>'required',
            'alamat'=>'required',
            'no_telephone'=>'required',
            'jumlah'=>'required',
            'barang_id'=>'required',
            'harga'=>'required',
            'tanggal_pesan'=>'required',
        ]);

        $pesanan = new Pesanan;
        $pesanan->pemesan = $request->pemesan;
        $pesanan->alamat = $request->alamat;
        $pesanan->no_telephone = $request->no_telephone;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->barang_id = $request->barang_id;
        $pesanan->harga = $request->harga;
        $pesanan->tanggal_pesan = $request->tanggal_pesan;
        $pesanan->save();
        
        $barang = Barang::findOrFail( $request->barang_id);
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('pesanan.index')->with('status', 'Pesanan Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('admin.pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pesanan = Pesanan::findOrFail($id);
        $barang = Barang::all();
        return view('admin.pesanan.edit', compact('pesanan','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pemesan' => 'required',
            'alamat'=>'required',
            'no_telephone'=>'required',
            'jumlah'=>'required',
            'barang_id'=>'required',
            'harga'=>'required',
            'tanggal_pesan'=>'required',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->pemesan = $request->pemesan;
        $pesanan->alamat = $request->alamat;
        $pesanan->no_telephone = $request->no_telephone;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->barang_id = $request->barang_id;
        $pesanan->harga = $request->harga;
        $pesanan->tanggal_pesan = $request->tanggal_pesan;
        $pesanan->save();
        return redirect()->route('pesanan.index')->with('status', 'Pesanan Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan =Pesanan::findOrFail($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('status', 'Pesanan Berhasil dihapus');
    }
}