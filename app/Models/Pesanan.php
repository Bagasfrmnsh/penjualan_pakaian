<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $visible = ['pemesan','alamat','no_telephone','jumlah','barang_id','harga','tanggal_pesan'];
    protected $fillable = ['pemesan','alamat','no_telephone','jumlah','barang_id','harga','tanggal_pesan'];
    public $timestamps = true;


    public function barang()
    {
        //data dari model "Pesanan" bisa dimiliki oleh model "Barang"
        //melalui fk "barang_id"
        return $this->belongsTo('App\Models\Barang', 'barang_id');
    }

    public function pembayaran()
    {
        $this->hasMany('App\Models\Pembayaran', 'pesanan_id');


    }

}