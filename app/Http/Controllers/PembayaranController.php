<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::orderbyDesc("created_at")->paginate(10);
        return view('admin.pembayaran.index', compact('pembayaran'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pembayaran.create');

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
            'no_telephone'=>'required',
            'qty'=>'required',
            'pesanan_id'=>'required',
            'tanggal_bayar'=>'required',
            'total'=>'required',
        ]);

        $pembayaran = new pembayaran;
        $pembayaran->nama_barang = $request->nama_barang;
        $pembayaran->tanggal_keluar = $request->tanggal_keluar;
        $pembayaran->qty = $request->qty;
        $pembayaran->pesanan_id = $request->pesanan_id;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $pembayaran->total = $request->total;
        $pembayaran->save();
        return redirect()->route('pembayaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validated = $request->validate([
            'pembayaran' => 'required',
        ]);

        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->pemesan = $request->pemesan;
        $pembayaran->save();
        return redirect()->route('pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
