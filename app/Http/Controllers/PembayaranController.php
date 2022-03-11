<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Alert;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Pesanan::all();
        return view('admin.pembayaran.create',compact('pesanan'));

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
            'pesanan_id'=>'required',
            'tanggal_bayar'=>'required',
        ]);

        $pembayaran = new pembayaran;
        $pembayaran->pesanan_id = $request->pesanan_id;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $pembayaran->total = $pembayaran->pesanan->jumlah * $pembayaran->pesanan->harga;
        $pembayaran->save();
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pembayaran' => 'required',
        ]);

        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->pemesan = $request->pemesan;
        $pembayaran->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    // {
    //     $pembayaran =Pembayaran::findOrFail($id);
    //     $pembayaran->delete();
    //     return redirect()->route('transaksi.index');
    // }
    if (!Pembayaran::destroy($id)) {
        return redirect()->back();
    }
    Alert::success('Success', 'Data deleted successfully');
    return redirect()->route('transaksi.index');
}

}

