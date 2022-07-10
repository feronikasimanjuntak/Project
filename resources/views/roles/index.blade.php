@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css"/>
<style>
    tr{
        border-color: #000000;
    }
    th{
        font-size: 20px;
        font-weight: bold;
        text-transform: uppercase;
    }
    td{
        font-size: 15px;
        font-weight: bold;
        text-transform: uppercase;
    }
</style>

<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success mb-3" href="{{ route('roles.create') }}"><b> Tambah Role baru</b></a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered border-dark table-hover" style="background-color: #e68967;">
  <tr>
     <th width="50px"><center>No</center></th>
     <th><center>Name</center></th>
     <th width="400px"><center>Action</center></th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td><center>{{ ++$i }}</center></td>
        <td>{{ $role->name }}</td>
        <td align="center">
            <a class="btn btn-primary" href="{{ route('roles.show',$role->id) }}"><b>Lihat</b></a>
            @can('role-edit')
                <a class="btn btn-success" href="{{ route('roles.edit',$role->id) }}"><b>Ubah</b></a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>
</div>

{!! $roles->render() !!}

@endsection
