@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css"/>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"><b> Kembali</b></a>
        </div>
    </div>
</div>


<div class="row mt-3">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" style="text-transform: uppercase;">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" style="text-transform: uppercase;">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
</div>
@endsection
