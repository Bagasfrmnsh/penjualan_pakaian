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
                <h1 class="m-0">Show Pesanan</h1>
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
                <div class="card-header">Show Data Pesanan</div>
                <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title" style: text-align = center>{{$pesanan->pemesan}}</h5>
        <p class="card-text">
       <div class="d-flex">
           <div class="col-6">Kode Pemesan :</div>
           <div class="col-6">{{$pesanan->kode_pesanan}}</div>

       </div>
       <div class="d-flex">
           <div class="col-6">Pemesan :</div>
           <div class="col-6">{{$pesanan->pemesan}}</div>

       </div>
       <div class="d-flex">
           <div class="col-6">Alamat :</div>
           <div class="col-6">{{$pesanan->alamat}}</div>

       </div>
       <div class="d-flex">
           <div class="col-6">Nomor Telephone :</div>
           <div class="col-6">{{$pesanan->no_telephone}}</div>

       </div>
        <div class="d-flex">
           <div class="col-6">Jumlah :</div>
           <div class="col-6">{{$pesanan->jumlah}}</div>

       </div>
    
        <div class="d-flex">
           <div class="col-6">Nama Barang :</div>
           <div class="col-6">{{$pesanan->barang->nama_barang}}</div>

       </div>
        <div class="d-flex">
           <div class="col-6">Harga :</div>
           <div class="col-6">{{$pesanan->barang->harga}}</div>

       </div>
       <div class="d-flex">
           <div class="col-6">Tanggal Pesan :</div>
           <div class="col-6">{{$pesanan->tanggal_pesan}}</div>

           </div>        
       </div>        
</p>
    </div>
  </div>
  <a href="{{route('pesanan.index')}}" class="btn btn-outline-primary float-left">Kembali</a>   
</div>



                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection