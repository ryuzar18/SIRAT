<!DOCTYPE html>
<html>
	<head>
	<style>
	#pegawai {
	  font-family: "Times New Roman", Times, serif;
	  font-size: 12px;
	  border-collapse: collapse;
	  width: 100%;
	}

	#pegawai td, #pegawai th {
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
	#pegawai tr:nth-child(even){background-color: #f2f2f2;}

	#pegawai tr:hover {background-color: #ddd;}

	#pegawai th {
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
		<table id="pegawai">
			<thead>
				<tr style=" border: 1px solid black;">
					<th>No</th>
					<th>NIP</th>
		            <th>Nama Lengkap</th>
		            <th>Pangkat</th>
		            <th>Jabatan</th>
		            <th>Eselon</th>
		            <th>Unit Kerja</th>
		            <th>Masa Kerja</th>
		            <th>Tempat Lahir</th>
		            <th>Tanggal Lahir</th>
		            <th>Email</th>
		            <th>No HP</th>
		            <th>Nama Ayah</th>
		            <th>Nama Ibu</th>
		            <th>SK CPNS</th>
		            <th>SK PNS</th>
		            <th>Gaji</th>
		            <th>Status Perkawinan</th>
		            <th>Tanggal Sumpah Jabatan</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($data as $item)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $item->nip }}</td>
		            <td>{{ $item->nama_lengkap }}</td>
		            <td>{{ $item->pangkat }}</td>
		            <td>{{ $item->jabatan }}</td>
		            <td>{{ $item->eselon }}</td>
		            <td>{{ $item->unit_kerja }}</td>
		            <td>{{ $item->masa_kerja }}</td>
		            <td>{{ $item->tempat_lahir }}</td>
		            <td>{{ $item->tanggal_lahir }}</td>
		            <td>{{ $item->email }}</td>
		            <td>{{ $item->no_hp }}</td>
		            <td>{{ $item->nama_ayah }}</td>
		            <td>{{ $item->nama_ibu }}</td>
		            <td>{{ $item->SK_CPNS }}</td>
		            <td>{{ $item->SK_PNS }}</td>
		            <td>{{ $item->gaji }}</td>
		            <td>{{ $item->status_perkawinan }}</td>
		            <td>{{ $item->sumpah }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</body>
</html>
