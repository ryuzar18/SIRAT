@extends('layout.app')


@section('content')
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif

<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Form Data Surat </h4>

  <form method="POST" enctype="multipart/form-data" action="{{ route('surat.update', $items->id) }}">
      @method('put')
      @csrf

  <div class="row">
  <div class="col-md-12">

    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
        <h6 class="m-0 font-weight-bold text-primary">Data Surat</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample1">
        <div class="card-body">

          <div class="form-group row">
          <label for="no_surat" class="col-md-2 col-form-label text-md-right">{{ __('No Surat') }}</label>
          <div class="col-md-9">
              <input id="no_surat" type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat" required autocomplete="no_surat" value="{{ $items->no_surat }}">
              <small id="help" class="form-text text-muted">Wajib Diisi
              </small>
              @error('no_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="no_agenda" class="col-md-2 col-form-label text-md-right">{{ __('No Agenda') }}</label>
          <div class="col-md-9">
              <input id="no_agenda" type="text" class="form-control @error('no_agenda') is-invalid @enderror" name="no_agenda" required autocomplete="no_agenda" value="{{ $items->no_agenda }}">
              <small id="help" class="form-text text-muted">Wajib Diisi
              </small>
              @error('no_agenda')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="jenis_surat" class="col-md-2 col-form-label text-md-right">{{ __('Jenis Surat') }}</label>
          <div class="col-md-5">
              <select id="jenis_surat" type="text" class="form-control @error('jenis_surat') is-invalid @enderror" name="jenis_surat" value="{{ old('jenis_surat') }}" required autocomplete="jenis_surat">
                <option value="Surat Masuk"  {{ $items->jenis_surat === 'Surat Masuk' ? 'selected' : ''}}>Surat Masuk</option>
                <option value="Surat Keluar" {{ $items->jenis_surat === 'Surat Keluar' ? 'selected' : ''}}>Surat Keluar</option>
              </select>
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('jenis_surat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="tanggal_kirim" class="col-md-2 col-form-label text-md-right">{{ __('Tanggal Kirim') }}</label>
          <div class="col-md-5">
              <input id="datepicker7" type="text" class="form-control @error('tanggal_kirim') is-invalid @enderror" name="tanggal_kirim" required autocomplete="tanggal_kirim" value="{{ $items->tanggal_kirim }}">
              <small id="help" class="form-text text-muted">Wajib Diisi
              </small>
              @error('tanggal_kirim')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="tanggal_terima" class="col-md-2 col-form-label text-md-right">{{ __('Tanggal Terima') }}</label>
          <div class="col-md-5">
              <input id="datepicker6" type="text" class="form-control @error('tanggal_terima') is-invalid @enderror" name="tanggal_terima" autocomplete="tanggal_terima" value="{{ $items->tanggal_terima }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('tanggal_terima')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="pengirim" class="col-md-2 col-form-label text-md-right">{{ __('Pengirim') }}</label>
          <div class="col-md-9">
              <input id="pengirim" type="text" class="form-control @error('pengirim') is-invalid @enderror" name="pengirim" autocomplete="pengirim" value="{{ $items->pengirim }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('pengirim')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="perihal" class="col-md-2 col-form-label text-md-right">{{ __('Perihal') }}</label>
          <div class="col-md-9">
              <textarea id="perihal" type="text" class="form-control @error('perihal') is-invalid @enderror" name="perihal" autocomplete="perihal" >{{ $items->perihal }}</textarea>
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('perihal')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="no_disposisi" class="col-md-2 col-form-label text-md-right">{{ __('No Disposisi') }}</label>
          <div class="col-md-9">
              <input id="no_disposisi" type="text" class="form-control @error('no_disposisi') is-invalid @enderror" name="no_disposisi" autocomplete="no_disposisi" value="{{ $items->no_disposisi }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('no_disposisi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="no_berangkas" class="col-md-2 col-form-label text-md-right">{{ __('No Berangkas') }}</label>
          <div class="col-md-9">
              <input id="no_berangkas" type="text" class="form-control @error('no_berangkas') is-invalid @enderror" name="no_berangkas" autocomplete="no_berangkas" value="{{ $items->no_berangkas }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('no_berangkas')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="file" class="col-md-2 col-form-label text-md-right">{{ __('File Surat') }}</label>

          <div class="col-md-6">
              <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" autocomplete="file">
              <small id="emailHelp" class="form-text text-muted">hanya file jpeg, png, jpg, pdf </small>
              @error('file')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row mb-0">
          <div class="col-md-1 offset-md-2">
              <button type="submit" class="btn btn-primary">
                  {{ __('Simpan') }}
              </button>
          </div>
      </div>



        </div>
      </div>
    </div>
  </div> <!-- end row 1 -->

  
  </div>


  </form>
</div>

@endsection
@section('chart')
<script type="text/javascript">
 $(function(){
  $("#datepicker1,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7,#datepicker8").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
@endsection
