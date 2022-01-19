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
                        <div class="form-group">
                            <label for="">Pemesan</label>
                            <input type="text" name="pemesan" value="{{$pesanan->pemesan}}" class="form-control @error('pemesan') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" value="{{$pesanan->alamat}}" class="form-control @error('alamat') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">No Telephone</label>
                            <input type="text" name="no_telephone" value="{{$pesanan->no_telephone}}" class="form-control @error('no_telephone') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" name="jumlah" value="{{$pesanan->jumlah}}" class="form-control @error('jumlah') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Id Barang</label>
                            <input type="text" name="barang_id" value="{{$pesanan->barang->id}}" class="form-control @error('barang_id') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" value="{{$pesanan->harga}}" class="form-control @error('harga') is-invalid @enderror" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pesan</label>
                            <input type="date" name="tanggal_pesan" value="{{$pesanan->tanggal_pesan}}" class="form-control @error('tanggal_pesan') is-invalid @enderror" readonly>
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