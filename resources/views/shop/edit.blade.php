@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Outfit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('shop.index') }}"> Back</a>
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

	{!! Form::model($outfit, ['method' => 'PATCH','route' => ['outfits.update', $outfit->id]]) !!}
    <!-- <form action="{{ route('outfits.update',$outfit->id) }}" method="POST"> -->
    	@csrf
        @method('PUT')


        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama:</strong>
					{!! Form::text('nama', null, array('placeholder' => 'nama','class' => 'form-control')) !!}
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Gambar:</strong>
					{!! Form::file('gambar', null, array('placeholder' => 'gambar','class' => 'form-control')) !!}
		            <!-- <input type="file" name="gambar" class="form-control"> -->
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Harga:</strong>
					{!! Form::number('harga', null, array('placeholder' => 'harga','class' => 'form-control')) !!}
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Stok:</strong>
					{!! Form::number('stok', null, array('placeholder' => 'stok','class' => 'form-control')) !!}
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
					{!! Form::textarea('detail', null, array('placeholder' => 'detail','class' => 'form-control')) !!}
		            <!-- <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea> -->
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
</div>
{!! Form::close() !!}
@endsection
