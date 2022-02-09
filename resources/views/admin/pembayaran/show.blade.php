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
                <h1 class="m-0">Show Transaksi</h1>
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
                <div class="card-header">Show Data Transaksi</div>
                <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Pemesan</label>
                            <input type="text" value="{{$transaksi->pesanan->pemesan}}" class="form-control @error('nama_barang') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">No Telephone</label>
                            <input type="text" value="{{$transaksi->pesanan->no_telephone}}" class="form-control @error('no_telephone') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Qty</label>
                            <input type="text" value="{{$transaksi->pesanan->jumlah}}" class="form-control @error('qty') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Bayar</label>
                            <input type="text" value="{{$transaksi->tanggal_bayar}}" class="form-control @error('tanggal_bayar') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="text" value="{{$transaksi->total}}" class="form-control @error('total ') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{url('admin/pesanan')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection