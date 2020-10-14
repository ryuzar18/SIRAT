@extends('layout.app')


@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Surat Masuk dan Keluar</h1>
    
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="display: block; text-align: right;">
    <div class="btn-group mr-2" role="group" aria-label="First group">
    
      <a class="btn btn-info text-white" id="masuk">Surat Masuk</a>
      <a class="btn btn-primary text-white" id="keluar">Surat Keluar</a>
      <a class="btn btn-warning text-white" id="reset">Reset</a>
    </div>
    <!--<div class="btn-group" role="group" aria-label="Third group">
      <a href="{{ route('laporan.keseluruhan') }}" class="btn btn-success">
          <i class="fas fa-fw fa-download"></i>
        </a>
    </div>-->
    <div class="collapse show" id="collapseCard2">
      <div class="card-body">
        <div class="card-columns">

        <div class="">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col md-2">
                  <label for="bulan">Laporan Keseluruhan</label>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="GET" action="{{ route('laporan.keseluruhan') }}" enctype="multipart/form-data">
                      @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-secondary">SEMUA</button>
                    </form>
                    
                    <form method="GET" action="{{ route('laporan.masuk') }}" enctype="multipart/form-data">
                      @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary">MASUK</button>
                    </form>

                    <form method="GET" action="{{ route('laporan.keluar') }}" enctype="multipart/form-data">
                      @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-success">KELUAR</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col md-2">
                  <form method="GET" action="{{ route('laporan.pengirim') }}" enctype="multipart/form-data">
                  @csrf
                  @method('GET')
                  <label for="bulan">Laporan Kategori Pengirim</label>
                  <select id="jenis" type="text" class="form-control col-md-12" name="jenis" value="{{ old('jenis') }}" required autocomplete="jenis">
                    @foreach($kategori as $k)
                      <option value="{{$k->pengirim}}">{{$k->pengirim}}</option>
                      @endforeach
                  </select>
                  &nbsp;
                  <div style="display: flex; justify-content: center;">
                                      <button class="btn btn-primary btn-lg" type="submit">
                        <i class="fas fa-download fa-sm"></i>
                      </button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col md-2">
                  <form method="GET" action="{{ route('laporan.bulanan') }}" enctype="multipart/form-data">
                  @csrf
                @method('GET')
                  <label for="bulan">Laporan Bulanan</label>
                  <input type="text" class="datepicker col-md-8" id="datemonth" name="bulan" required>
                  <button class="btn btn-primary btn-lg" type="submit">
                        <i class="fas fa-download fa-sm"></i>
                      </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col md-2">
                  <form method="GET" action="{{ route('laporan.tahunan') }}" enctype="multipart/form-data">
                  @csrf
                @method('GET')
                  <label for="bulan">Laporan Tahunan</label>
                  <input type="text" class="datepicker col-md-8" id="dateyear" name="tahun" required>
                  <button class="btn btn-primary btn-lg" type="submit">
                        <i class="fas fa-download fa-sm"></i>
                      </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
    </div>
    &nbsp;
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
    <br>
    <a href="{{ route('surat.create') }}" class="btn btn-dark  type="submit">Tambah Data</a>

  </div>
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered surat" id="data" width="100%" cellspacing="0">
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
              <a href="{{ route('surat.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
              <a href="" data-toggle="modal" data-target="#deleteModal{{ $item->id }}" class="btn btn-primary">Recycle</a>
              <a href="" data-toggle="modal" data-target="#deleteModal1{{ $item->id }}" class="btn btn-danger">Hapus</a> 
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
                <div class="modal-body">Tekan "Hapus" jika ingin menghapus data surat ini, data akan berpindah ke dalam <i>Recycle Bin</i>.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <form  action="{{ route('surat.destroy', $item->id) }}" method="POST" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="deleteModal1{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus ?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Tekan "Iya" jika ingin menghapus data ini.</div>
                <div class="modal-footer">
                  <form  action="{{ url('/surat/delete/'.$item->id) }}" method="POST" style="display: none;">
                    <button type="submit" class="btn btn-danger">Iya</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
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