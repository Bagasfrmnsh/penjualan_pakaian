@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Edit Produk</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Data Produk</div>
                <div class="card-body">
                    <form action="{{route('pengelola.update', $barang->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Kode Barang</label>
                            <input type="text" name="kode_barang" value="{{$barang->kode_barang}}" class="form-control @error('kode_barang') is-invalid @enderror">
                             @error('kode_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="form-control @error('nama_barang') is-invalid @enderror">
                             @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" value="{{$barang->tanggal_masuk}}" class="form-control @error('tanggal_masuk') is-invalid @enderror">
                             @error('tanggal_masuk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" name="stok" value="{{$barang->stok}}" class="form-control @error('stok') is-invalid @enderror">
                             @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="harga" value="{{$barang->harga}}" class="form-control @error('harga') is-invalid @enderror">
                             @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror"> 
                          <option value="">-- Pilih Kategori-- </option>
                          <option value="Anak-Anak">Anak-Anak</option>
                          <option value="Remaja">Remaja</option>
                          <option value="Dewasa">Dewasa</option>
                          @error('kategori')
                          <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>
                      </div>
            <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi"  class="form-control @error('deskripsi') is-invalid @enderror">{{$barang->deskripsi}}</textarea>
                             @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Gambar</label>
                            <input type="file" name="gambar" value="{{$barang->gambar}}" class="form-control @error('cover') is-invalid @enderror">
                             @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection