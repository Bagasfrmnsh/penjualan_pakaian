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
                <h1 class="m-0">Show Produk</h1>
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
                <div class="card-header">Show Data Produk</div>
                <div class="card-body">
                    <form action="{{route('pengelola.update', $barang->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{$barang->image()}}" alt="" style="width:150px; height:150px;" alt="gambar">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" style: text-align = center>{{$barang->nama_barang}}</h5>
        <p class="card-text">
       <div class="d-flex">
           <div class="col-6">Kode Barang :</div>
           <div class="col-6">{{$barang->kode_barang}}</div>

       </div>
       <div class="d-flex">
           <div class="col-6">Nama Barang :</div>
           <div class="col-6">{{$barang->nama_barang}}</div>

       </div>
       <div class="d-flex">
           <div class="col-6">Stock :</div>
           <div class="col-6">{{$barang->stok}}</div>

       </div>
       <div class="d-flex">
           <div class="col-6">Tanggal Masuk :</div>
           <div class="col-6">{{$barang->tanggal_masuk}}</div>

       </div>
        <div class="d-flex">
           <div class="col-6">Harga :</div>
           <div class="col-6">{{$barang->harga}}</div>

       </div>
    
        <div class="d-flex">
           <div class="col-6">Kategori</div>
           <div class="col-6">{{$barang->kategori}}</div>

       </div>
        <div class="d-flex">
           <div class="col-6">Deskripsi</div>
           <div class="col-6">{{$barang->deskripsi}}</div>

       </div>
      </div>
</p>
    </div>
  </div>
</div>
<a href="{{route('pengelola.index')}}" class="btn btn-outline-primary float-left">Kembali</a>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection