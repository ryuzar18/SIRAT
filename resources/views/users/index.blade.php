@extends('layout.app')


@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pengguna</h1>
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif
@if (\Session::has('warning'))
<div class="alert alert-warning" role="alert">
    {!! \Session::get('warning') !!}
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengguna</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="data" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
        	@foreach($user as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <?php if ($user->role == 0): ?>
              <td>Admin</td>
            <?php endif ?>
            <?php if ($user->role == 1): ?>
              <td>Pegawai</td>
            <?php endif ?>
            <td>
            	<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Ubah</a>
              <a href="" data-toggle="modal" data-target="#deleteModal{{ $user->id }}" class="btn btn-danger">Hapus</a>
            </td>
          </tr>

          <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Tekan "Hapus" jika ingin menghapus data pengguna ini.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <form  action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
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