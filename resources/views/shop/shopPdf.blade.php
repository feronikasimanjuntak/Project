@section('content')

<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Outfit</h4>
	</center>

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Details</th>
        </tr>
	    @foreach ($outfits as $outfit)
	    <tr>
	        <td>{{ $outfit->nama }}</td>
	        <td>{{ $outfit->gambar }}</td>
	        <td>{{ $outfit->harga }}</td>
	        <td>{{ $outfit->stok }}</td>
	        <td>{{ $outfit->detail }}</td>
	        <td>
	        </td>
	    </tr>
	    @endforeach
    </table>
</body>
