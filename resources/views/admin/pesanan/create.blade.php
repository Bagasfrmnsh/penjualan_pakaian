@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard |
Pesanan

@endsection
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambah Pesanan?</h1>
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
                    Data Pesanan
                </div>
                <div class="card-body">
                   <form action="{{route('pesanan.store')}}" method="post" enctype="multipart/form-data" placeholder="Masukan Angka" pottern="{12}" title="Dengan angka">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Pesanan</label>
                            <select type="text" name="kode_pesanan" class="form-control @error('kode_barang') is-invalid @enderror">
                                @foreach($barang as $data)
                                <option value="{{$data->id}}">{{$data->kode_barang}}</option>
                                @endforeach
                            </select>
                             @error('kode_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Pemesan</label>
                            <textarea id="pemesan" name="pemesan" class="form-control @error('pemesan') is-invalid @enderror"></textarea>
                             @error('pemesan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>@error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telephone</label>
                            <input type="number" name="no_telephone" class="form-control @error('no_telephone') is-invalid @enderror">
                             @error('no_telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                             @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <select type="text" name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
                                @foreach($barang as $data)
                                <option value="{{$data->id}}">{{$data->nama_barang}}</option>
                                @endforeach
                            </select>
                             @error('barang_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <select type="text" name="harga" class="form-control @error('harga') is-invalid @enderror">
                                @foreach($barang as $data)
                                <option value="{{$data->harga}}">{{$data->harga}}</option>
                                @endforeach
                            </select>
                             @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pesan</label>
                            <input type="date" name="tanggal_pesan" class="form-control @error('tanggal_pesan') is-invalid @enderror">
                             @error('tanggal_pesan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Kembali</button>
                            <button type="submit" class="btn btn-outline-primary">Checkout</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection