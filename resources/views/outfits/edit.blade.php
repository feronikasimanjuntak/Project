@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css"/>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="pull-left">
                <h2><b>UBAH OUTFIT</b></h2>
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

    <div id="wrapper" style="background-color: #e68967;" class="mt-3">
	{!! Form::model($outfit, ['method' => 'PATCH','route' => ['outfits.update', $outfit->id]]) !!}
    <!-- <form action="{{ route('outfits.update',$outfit->id) }}" method="POST"> -->
    	@csrf
        @method('PUT')


        <div class="form-row">
		    <div class="form-group">
                <div class="form-group col-md-12">
                    <label for="nama" class="col-form-label"><strong>Nama :</strong></label>
					<input type="nama" name="nama" class="form-control" value="{{ $outfit->nama }}">
		        </div>

		        <div class="form-group">
                    <div class="form-group col-md-12">
                        <label for="gambar" class="col-form-label"><strong>Gambar :</strong></label>
                        <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Image URL"><br>
                        <div class="slide col-4" data-thumb="{{asset('img/'.$outfit->gambar)}}"><a href="{{asset('img/'.$outfit->gambar)}}" title="Preview Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('img/'.$outfit->gambar)}}" alt="{{$outfit->gambar}}" class="img-fluid img-thumbnail"></a></div>
                        <!-- <input type="file" name="gambar" class="form-control"> -->
                    </div>
                </div>

		        <div class="form-group">
                    <div class="form-group col-md-12">
                        <label for="harga" class="col-form-label"><strong>Harga :</strong></label>
                        {!! Form::number('harga', null, array('placeholder' => 'harga','class' => 'form-control')) !!}
                    </div>
                </div>

		        <div class="form-group">
                    <div class="form-group col-md-12">
                        <label for="stok" class="col-form-label"><strong>Stok :</strong></label>
                        {!! Form::number('stok', null, array('placeholder' => 'stok','class' => 'form-control')) !!}
                    </div>
                </div>

		        <div class="form-group">
                    <div class="form-group col-md-12">
                        <label for="kategori" class="col-form-label"><strong>Kategori :</strong></label>
                        <select class="form-control" id="kategori" name="kategori" value="{{ $outfit->kategori }}">
                            <option>{{ $outfit->kategori }}</option>
                            <option>Baju</option>
                            <option>Celana</option>
                            <option>Jaket</option>
                        </select>
                    </div>
                </div>

		        <div class="form-group">
                    <div class="form-group col-md-12">
                        <label for="detail" class="col-form-label"><strong>Detail :</strong></label>
                        {!! Form::textarea('detail', null, array('placeholder' => 'detail','class' => 'form-control')) !!}
                        <!-- <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea> -->
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success"><b>Submit</b></button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
