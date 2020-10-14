@extends('layout.app')


@section('content')
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif

<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Form Data Kepegawaian </h4>
  <form method="POST" enctype="multipart/form-data" action="{{ route('pegawai.update', $items->id) }}">
      @method('put')
      @csrf

    <div class="row">
  <div class="col-md-6">

    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
        <h6 class="m-0 font-weight-bold text-primary">Data Kepegawaian</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="collapseCardExample1">
        <div class="card-body">

          <div class="form-group row">
          <label for="nip" class="col-md-3 col-form-label text-md-right">{{ __('NIP') }}</label>
          <div class="col-md-9">
              <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" required autocomplete="nip" value="{{ $items->nip }}">
              <small id="help" class="form-text text-muted">Wajib Diisi
              </small>
              @error('nip')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="pangkat" class="col-md-3 col-form-label text-md-right">{{ __('Pangkat') }}</label>
          <div class="col-md-9">
              <input id="pangkat" type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" autocomplete="pangkat" value="{{ $items->pangkat }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('pangkat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="jabatan" class="col-md-3 col-form-label text-md-right">{{ __('Jabatan') }}</label>
          <div class="col-md-9">
              <input id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" required autocomplete="jabatan" value="{{ $items->jabatan }}">
              <small id="help" class="form-text text-muted">Wajib Diisi
              </small>
              @error('jabatan')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="eselon" class="col-md-3 col-form-label text-md-right">{{ __('ESELON') }}</label>
          <div class="col-md-9">
              <input id="eselon" type="text" class="form-control @error('eselon') is-invalid @enderror" name="eselon" autocomplete="eselon" value="{{ $items->eselon }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('eselon')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="unit_kerja" class="col-md-3 col-form-label text-md-right">{{ __('Unit Kerja') }}</label>
          <div class="col-md-9">
              <input id="unit_kerja" type="text" class="form-control @error('unit_kerja') is-invalid @enderror" name="unit_kerja" autocomplete="unit_kerja" value="{{ $items->unit_kerja }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('unit_kerja')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="masa_kerja" class="col-md-3 col-form-label text-md-right">{{ __('Masa Kerja') }}</label>
          <div class="col-md-9">
              <input id="masa_kerja" type="text" class="form-control @error('masa_kerja') is-invalid @enderror" name="masa_kerja" autocomplete="masa_kerja" value="{{ $items->masa_kerja }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('masa_kerja')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="SK_CPNS" class="col-md-3 col-form-label text-md-right">{{ __('SK CPNS') }}</label>
          <div class="col-md-9">
              <input id="SK_CPNS" type="text" class="form-control @error('SK_CPNS') is-invalid @enderror" name="SK_CPNS" autocomplete="SK_CPNS" value="{{ $items->SK_CPNS }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('SK_CPNS')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="SK_PNS" class="col-md-3 col-form-label text-md-right">{{ __('SK PNS') }}</label>
          <div class="col-md-9">
              <input id="SK_PNS" type="text" class="form-control @error('SK_PNS') is-invalid @enderror" name="SK_PNS" autocomplete="SK_PNS" value="{{ $items->SK_PNS }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('SK_PNS')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="gaji" class="col-md-3 col-form-label text-md-right">{{ __('Gaji') }}</label>
          <div class="col-md-9">
              <input id="gaji" type="text" class="form-control @error('gaji') is-invalid @enderror" name="gaji" autocomplete="gaji" value="{{ $items->gaji }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('gaji')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="sumpah" class="col-md-3 col-form-label text-md-right">{{ __('Tanggal Sumpah Jabatan') }}</label>
          <div class="col-md-9">
              <input id="datepicker1" type="text" class="form-control @error('sumpah') is-invalid @enderror" name="sumpah" autocomplete="sumpah" value="{{ $items->sumpah }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('sumpah')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

        </div>
      </div>
    </div>
  </div> <!-- end row 1 -->

  <div class="col-md-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#axe2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="axe2">
        <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="axe2">
        <div class="card-body">

          <div class="form-group row">
          <label for="nama_lengkap" class="col-md-3 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
          <div class="col-md-9">
              <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" required autocomplete="nama_lengkap" value="{{ $items->nama_lengkap }}">
              <small id="help" class="form-text text-muted">Wajib Diisi
              </small>
              @error('nama_lengkap')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="tempat_lahir" class="col-md-3 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>
          <div class="col-md-9">
              <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" autocomplete="tempat_lahir" value="{{ $items->tempat_lahir }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('tempat_lahir')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="tanggal_lahir" class="col-md-3 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>
          <div class="col-md-9">
              <input id="datepicker2" type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" autocomplete="tanggal_lahir" value="{{ $items->tanggal_lahir }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('tanggal_lahir')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Email') }}</label>
          <div class="col-md-9">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" value="{{ $items->email }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="no_hp" class="col-md-3 col-form-label text-md-right">{{ __('No HP') }}</label>
          <div class="col-md-9">
              <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" autocomplete="no_hp" value="{{ $items->no_hp }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('no_hp')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="nama_ayah" class="col-md-3 col-form-label text-md-right">{{ __('Nama Ayah') }}</label>
          <div class="col-md-9">
              <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" autocomplete="nama_ayah" value="{{ $items->nama_ayah }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('nama_ayah')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>
          <div class="form-group row">
          <label for="nama_ibu" class="col-md-3 col-form-label text-md-right">{{ __('Nama Ibu') }}</label>
          <div class="col-md-9">
              <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" autocomplete="nama_ibu" value="{{ $items->nama_ibu }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('nama_ibu')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row">
          <label for="status_perkawinan" class="col-md-3 col-form-label text-md-right">{{ __('Status Perkawinan') }}</label>
          <div class="col-md-9">
              <input id="status_perkawinan" type="text" class="form-control @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" autocomplete="status_perkawinan" value="{{ $items->status_perkawinan }}">
              <small id="help" class="form-text text-muted">Wajib Diisi</small>
              @error('status_perkawinan')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          </div>

          <div class="form-group row mb-">
          <div class="col-md-1 offset-md-3">
              <button type="submit" class="btn btn-primary ">
                  {{ __('Simpan') }}
              </button>
          </div>
          </div>

      </div>
    
    </div>
  </div>

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
