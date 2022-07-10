@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css"/>
<style>
    ul li{
        font-weight: bold;
        font-size: 15px;
        text-transform: capitalize;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Lihat Outfit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('outfits.index') }}"><b> Kembali</b></a>
            </div>
        </div>
    </div>

    <div class="card mt-5" style="max-width: 1300px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('../img/' .$outfit['gambar']) }}" alt="..." style="width: 18rem";>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><b>{{ $outfit['nama'] }}</b></h3>
                    <p class="card-text">{{ $outfit['detail'] }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori: {{ $outfit['kategori'] }}</li>
                        <li class="list-group-item">Harga: Rp{{ $outfit['harga'] }}</li>
                        <li class="list-group-item">Stok: {{ $outfit['stok'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
