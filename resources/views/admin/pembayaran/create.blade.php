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
                <h1 class="m-0">Tambah Data Transaksi</h1>
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
                <div class="card-header">
                    Data Transaksi
                </div>
                <div class="card-body">
                   <form action="{{route('transaksi.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Pemesan</label>
                            <select name="pesanan_id" class="form-control @error('pesanan_id') is-invalid @enderror" >
                                @foreach($pesanan as $data)
                                    <option value="{{$data->id}}">{{$data->pemesan}}</option>
                                @endforeach
                            </select>
                            @error('pesanan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>nama pemesan wajib di isi!</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" class="form-control @error('tanggal_bayar') is-invalid @enderror">
                             @error('tanggal_bayar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>tanggal bayar wajib di isi!</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection