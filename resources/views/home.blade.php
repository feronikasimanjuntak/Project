@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css" />
<noscript><link rel="stylesheet" href="{{asset('css/noscript.css')}}" /></noscript>

<div id="wrapper" style="background-color: #e68967;">
    <h1>FASHION</h1>
    <div class="text-uppercase mb-4"><h4>Toko Pakaian Online Yang Akan Memenuhi gaya dan Kebutuhanmu</h4></div>
    <button type="button" class="btn btn-outline-light" style="color:#000000"><b>Geser ke Bawah</b></button>
</div>

<div class="container">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form id="form_filter">
                <select onchange="load_kategori();" name="kategori" class="form-control">
                    <option value="semua" selected disabled>Pilih opsi</option>
                    <option value="baju">Baju</option>
                    <option value="celana">Celana</option>
                    <option value="jaket">Jaket</option>
                </select>
                </form>
            </div>
        </div>
    </div>

    <div class="row m-1 mt-2">
            @foreach ($outfits as $outfit)
            <div class="col mb-3">
                <div class="card" style="width: 20rem; height: 27rem; border-width: 3px; border-style:solid;border-color: #000000;">
                    <img src="{{ asset('../img/' .$outfit['gambar']) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center><h4 class="card-title">{{ $outfit['nama'] }}</h4>
                        <p class="card-text">Harga: Rp{{ $outfit['harga'] }}</p></center>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('custom_js')
<script type="text/javascript">
    function load_kategori() {
       let data = $('#form_filter').serialize();
       location.href = '?' + data;
    }
</script>
@endsection
