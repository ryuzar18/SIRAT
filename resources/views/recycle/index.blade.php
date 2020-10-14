@extends('layout.app')


@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tempat Sampah Surat</h1>
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="data" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>No Agenda</th>
            <th>Jenis Surat</th>
            <th>Tanggal</th>
            <th>Pengirim</th>
            <th>Perihal</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php $no = 1; ?>
          @foreach($items as $item)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $item->no_surat }}</td>
            <td>{{ $item->no_agenda }}</td>
            <td>{{ $item->jenis_surat }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->pengirim }}</td>
            <td>{{ $item->perihal }}</td>
            <?php $no++; ?>
            <td>
            	<a href="" data-toggle="modal" data-target="#restoreModal{{ $item->id }}" class="btn btn-warning">Pulihkan</a>
              <a href="" data-toggle="modal" data-target="#deleteModal{{ $item->id }}" class="btn btn-danger">Hapus</a>
            </td>
          </tr>

          <div class="modal fade" id="restoreModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin memulihkan?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Tekan "Pulihkan" jika ingin memulihkan data ini.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form  action="{{ url('/recycle/surat/restore/'.$item->id) }}" method="POST" style="display: none;">
                    <button type="submit" class="btn btn-primary">Pulihkan</button>
                      @csrf
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Tekan "Hapus" jika ingin menghapus data ini.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form  action="{{ url('/recycle/surat/delete/'.$item->id) }}" method="POST" style="display: none;">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                      @csrf
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