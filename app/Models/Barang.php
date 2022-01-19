<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['nama_barang','stock','tanggal_masuk','harga','kategori','deskripsi','gambar'];
    protected $visible =  ['nama_barang','stock','tanggal_masuk','harga','kategori','deskripsi','gambar'];

    public function pesanans()
    {
        //data model "dataAuthor" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Pesanan', 'barang_id');
    }

    public function image()
    {
        if ($this->gambar && file_exists(public_path('image/barangs/' . $this->gambar))) {
            return asset('image/barangs/' . $this->gambar);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('image/barangs/' . $this->gambar))) {
            return unlink(public_path('image/barangs/' . $this->gambar));
        }

    }
}