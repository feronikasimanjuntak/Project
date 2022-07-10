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
        <div class="pull-left">
            <h2>SHOP</h2>
        </div>
    </div>


    <div class="row m-1">
        @foreach ($shops as $shop)
        <div class="col mb-3">
            <div class="card" style="width: 21rem; height: 41rem; border-width: 3px; border-style: solid;border-color: #000000;">
                <img src="{{ asset('../img/' .$shop['gambar']) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">{{ $shop['nama'] }}</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Harga: Rp {{ $shop['harga'] }}</li>
                        <li class="list-group-item">Stok: {{ $shop['stok'] }}</li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="row p-2 border bg-light" style="align-content: center;">
                        <form action="{{ route('shops.destroy',$shop->id) }}" method="POST">
                            @can('outfit-list')
                            <input class="form-control mb-3" type="number" name="jumlah" placeholder="jumlah">
                            <a class="btn btn-info" href="{{ route('shop.buy') }}"><b>Beli</b></a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('outfit-delete')
                            <button type="submit" class="btn btn-danger"><b>Hapus</b></button>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>

	    @endforeach
    </div>

@endsection
