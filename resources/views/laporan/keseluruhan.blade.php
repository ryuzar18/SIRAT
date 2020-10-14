<!DOCTYPE html>
<html>
	<head>
	<style>
	#surat {
	  font-family: "Times New Roman", Times, serif;
	  font-size: 12px;
	  border-collapse: collapse;
	  width: 100%;
	}

	#surat td, #surat th {
	  border: 1px solid #000000;
	  padding: 8px;
	}

	h4, h5{
		font-family: "Times New Roman", Times, serif;
		margin-top: 10px;
		margin-bottom: 10px;
	}

	h5{
		font-size: 14px;
	}
	#surat tr:nth-child(even){background-color: #f2f2f2;}

	#surat tr:hover {background-color: #ddd;}

	#surat th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #0000cd;
	  color: white;
	}
	</style>
	</head>
	<body>
		<table align="center">
			<tr>
				<td align="center"><img src="logo1.png" height="80" width="70"></td>
				<td><center>
					<font size="12">BADAN METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA</font><BR>
					<font size="13"><b>STASIUN METEOROLOGI KELAS I SULTAN AJI MUHAMMAD SULAIMAN SEPINGGAN BALIKPAPAN</b></font><BR>
					<font size="2">Jl. Marsma. R. Iswahyudi No. 356 Sepinggan Balikpapan 76115</font><BR>
					<font size="2">E-mail : stamet.sepinggan@bmkg.go.id / stamet_balikpapan@yahoo.co.id</font>
				</td>
			</tr>
		</table>
		<hr />
			<center>
				<h4 style="font-size: 20px;">{{ $judul }}</h4>
				&nbsp;
			</center>
			<h5>Tanggal : {{ $tanggal }}</h5>
			<h5>Jumlah Data : {{ $jumlah }}</h5>
			@if(!empty($sub))
			<h5>{{ $sub }}</h5>
			@endif
			<table id="surat">
				<thead>
					<tr style=" border: 1px solid black;">
						<th>No</th>
						<th>No Surat</th>
						<th>No Agenda</th>
						<th>Jenis Surat</th>
						<th>Tanggal Kirim</th>
						<th>Tanggal Terima</th>
						<th>Pengirim</th>
						<th>Perihal</th>
						<th>No Disposisi</th>
						<th>No Berangkas</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1 @endphp
					@foreach($data as $item)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $item->no_surat }}</td>
						<td>{{ $item->no_agenda }}</td>
						<td>{{ $item->jenis_surat }}</td>
						<td>{{ $item->tanggal_kirim }}</td>
						<td>{{ $item->tanggal_terima }}</td>
						<td>{{ $item->pengirim }}</td>
						<td>{{ $item->perihal }}</td>
						<td>{{ $item->no_disposisi }}</td>
						<td>{{ $item->no_berangkas }}</td>
					</tr>
					@endforeach
					</tbody>
				</table>

	</body>
</html>
