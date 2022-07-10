@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css"/>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-left">
                <h2>Tambah Outfit Baru</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('outfits.index') }}"><b> Kembali</b></a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="wrapper" style="background-color: #e68967;">
    <form action="{{ route('outfits.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama:</strong>
		            <input type="nama" name="nama" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Gambar:</strong>
		            <input type="file" name="gambar" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Harga:</strong>
		            <input type="number" name="harga" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Stok:</strong>
		            <input type="number" name="stok" class="form-control">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Kategori:</strong>
                    <select name="kategori" class="form-control">
                        <option>Baju</option>
                        <option>Celana</option>
                        <option>Jaket</option>
                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-success"><b>Submit</b></button>
		    </div>
		</div>
    </form>
	</div>
</div>
@endsection
