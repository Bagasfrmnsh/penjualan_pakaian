<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $visible = ['pesanan_id','tanggal_bayar','total'];
    protected $fillable = ['pesanan_id','tanggal_bayar','total'];
    public $timestamps = true;


    public function laporan()
    {
        //data dari model "Pesanan" bisa dimiliki oleh model "Barang"
        //melalui fk "barang_id"
        return $this->hasMany('App\Models\Laporan', 'pembayaran_id');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\Models\Pesanan', 'pesanan_id');


    }



}
