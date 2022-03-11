<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class Pesanan extends Model
{
    use HasFactory;
    protected $visible = ['kode_pesanan','pemesan','alamat','no_telephone','jumlah','barang_id','harga','tanggal_pesan'];
    protected $fillable = ['kode_pesanan','pemesan','alamat','no_telephone','jumlah','barang_id','harga','tanggal_pesan'];
    public $timestamps = true;


    public function barang()
    {
        //data dari model "Pesanan" bisa dimiliki oleh model "Barang"
        //melalui fk "barang_id"
        return $this->belongsTo('App\Models\Barang', 'barang_id');
    }

    public function pembayaran()
    {
       return $this->hasMany('App\Models\Pembayaran', 'pesanan_id');


    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::deleting(function ($parent) {
    //         if ($parent->barang->count() > 0) {
    //             Alert::error('Failed', 'Data not deleted');
    //             return false;
    //         }
    //     });
    // }

}
