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
        <div class="col-lg-12 mb-1">
            <div class="pull-left">
                <h2>outfits</h2>
            </div>
            <div class="d-flex justify-content-between">
            <div>
            @can('outfit-create')
                <a class="btn btn-success" href="{{ route('outfits.create') }}"><b> Tambah Outfit Baru</a></b>
                <a class="btn btn-primary" href="/outfitPdf"><b> Cetak PDF</a></b>
                <a class="btn btn-primary" href="/export_excel"><b> Cetak Excel</a></b>
            @endcan
            </div>
                <form class="d-flex">
                    <input type="" id="inputSearch" class="form-control" placeholder=""/>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row m-1 mt-2">
        @foreach ($outfits as $outfit)
        <div class="col mb-3">
            <div class="card searchResult" style="width: 21rem; height: 41rem; border-width: 3px; border-style: solid;border-color: #000000;">
                <img src="{{ asset('../img/' .$outfit['gambar']) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">{{ $outfit['nama'] }}</h3>
                    <!-- <p class="card-text">{{ $outfit['detail'] }}</p> -->
                    <!-- <p class="card-text">Harga: Rp{{ $outfit['harga'] }}</p>
                    <p class="card-text">Stok: {{ $outfit['stok'] }}</p> -->

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kategori : {{ $outfit['kategori'] }}</li>
                        <li class="list-group-item">Harga : Rp{{ $outfit['harga'] }}</li>
                        <li class="list-group-item">Stok : {{ $outfit['stok'] }}</li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="row p-3 border bg-light" style="align-content: center;">
                        <form action="{{ route('outfits.destroy',$outfit->id) }}" method="POST">
                            @can('outfit-list')
                            <a class="btn btn-primary" href="{{ route('outfits.show',$outfit->id) }}"><b>Lihat</b></a>
                            @endcan
                            @can('outfit-edit')
                            <a class="btn btn-success" href="{{ route('outfits.edit',$outfit->id) }}"><b>Ubah</b></a>
                            @endcan


                            @csrf
                            @method('DELETE')
                            @can('outfit-delete')
                            <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"><b>Hapus</b></button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Peringatan</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">
                                                <p>Apakah anda yakin untuk menghapus data pakaian ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-primary">Yakin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>

	    @endforeach
    </div><br>
    @can('outfit-edit')
    <div class="container mt-3">
        <div id="chartFashion"></div>
    </div>
    @endcan
    <div class="container mb-3">
        {!! $outfits->links() !!}
    </div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartFashion', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Kategori Outfit'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Outfit'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Kategori Outfit',
        data: {!!json_encode($data)!!},
    }]
});
</script>
</div>


@endsection

