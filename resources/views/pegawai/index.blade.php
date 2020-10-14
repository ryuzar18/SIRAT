@extends ('layout.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kepegawaian</h1>

<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="display: block; text-align: right;">
    <div class="btn-group" role="group" aria-label="Third group">
      <a href="{{ route('laporan.keseluruhan1') }}" class="btn btn-success">Cetak Laporan</a>
    </div>
  </div>
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
    <br>
    <a href="{{ route('pegawai.create') }}" class="btn btn-dark " type="submit">Tambah Data</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="data" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Pangkat</th>
            <th>Jabatan</th>
            <th>Eselon</th>
            <th>Unit Kerja</th>
            <th>Masa Kerja</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
        	<?php $no = 1; ?>
          @foreach($items as $item)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->pangkat }}</td>
            <td>{{ $item->jabatan }}</td>
            <td>{{ $item->eselon }}</td>
            <td>{{ $item->unit_kerja }}</td>
            <td>{{ $item->masa_kerja }}</td>
            <?php $no++; ?>
            <td>
            	<a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
              <a href="" data-toggle="modal" data-target="#deleteModal{{ $item->id }}" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Tekan "Hapus" jika ingin menghapus data ini, data akan berpindah ke dalam <i>Recycle Bin</i>.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <form  action="{{ route('pegawai.destroy', $item->id) }}" method="POST" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
@section('chart')
<script>
  $("#datemonth").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});

  $("#dateyear").datepicker( {
    format: "yyyy",
    startView: "years", 
    minViewMode: "years"
});
</script>
@endsection