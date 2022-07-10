@section('content')

<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        table {
            font-family: Arial, Helvetica, sans-serif;
            color: #000000;
            background: #eaebec;
            border: #ccc 1px solid;
        }
	</style>
	<center>
		<h5>LAPORAN OUTFIT DI TOKO FASHION</h4>
	</center>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Details</th>
        </tr>
	    @foreach ($outfits as $outfit)
	    <tr>
	        <td>{{ $outfit->nama }}</td>
	        <td>{{ $outfit->gambar }}</td>
	        <td>{{ $outfit->harga }}</td>
	        <td>{{ $outfit->stok }}</td>
            <td>{{ $outfit->kategori }}</td>
	        <td>{{ $outfit->detail }}</td>
	    </tr>
	    @endforeach
    </table>
</body>
