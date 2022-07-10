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
    }
</style>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb mb-3">
        <div class="pull-left">
            <h2>Manajemen User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"><b> Tambah User Baru</b></a>
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
    <th><center>No</center></th>
    <th><center>Name</center></th>
    <th><center>Email</center></th>
    <th><center>Roles</center></th>
    <th width="280px"><center>Action</th>
</tr>
 @foreach ($data as $key => $user)
<tr>
    <td><center>{{ ++$i }}</center></td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td align="center">
        @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
            <label class="badge badge-warning center">{{ $v }}</label>
        @endforeach
        @endif
    </td>
    <td align="center">
        <a class="btn btn-primary" href="{{ route('users.show',$user->id) }}"><b>Lihat</b></a>
        <a class="btn btn-success" href="{{ route('users.edit',$user->id) }}"><b>Ubah</b></a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach
</table>
</div>
<div class="container mb-3">
    {!! $data->render() !!}
</div>

@endsection
