@extends('layout.app')


@section('content')
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h5 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna</h5>
</div>
<div class="card-body">
  <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
  	@csrf
	    <div class="form-group row">
	        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nama') }}</label>

	        <div class="col-md-6">
	            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
	            <small id="emailHelp" class="form-text text-muted">Wajib Diisi</small>
	            @error('name')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Alamat Email') }}</label>

	        <div class="col-md-6">
	            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
	            <small id="emailHelp" class="form-text text-muted">Wajib Diisi, pastikan email asli</small>
	            @error('email')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Hak') }}</label>

	        <div class="col-md-6">
	        	<select id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role">
		            <option value="0">Admin</option>
		            <option value="1">Pegawai</option>
		        </select>
		        <small id="emailHelp" class="form-text text-muted">Wajib Diisi</small>
	            @error('role')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Kata Sandi') }}</label>

	        <div class="col-md-6">
	            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
	            <small id="emailHelp" class="form-text text-muted">Minimal 8 Karakter</small>

	            @error('password')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Konfirmasi Kata Sandi') }}</label>

	        <div class="col-md-6">
	            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
	        </div>
	    </div>

	    <div class="form-group row">
	        <label for="foto" class="col-md-2 col-form-label text-md-right">{{ __('Foto Profil') }}</label>

	        <div class="col-md-6">
	            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"autocomplete="foto">
	            <small id="emailHelp" class="form-text text-muted">Max : 8MB, hanya file jpeg,png,jpg</small>
	            @error('foto')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
	        </div>
	    </div>

	    <div class="form-group row mb-0">
	        <div class="col-md-1 offset-md-2">
	            <button type="submit" class="btn btn-success btn-user btn-block">
	                {{ __('Daftar') }}
	            </button>
	        </div>
	    </div>
	</form>
</div>
</div>
@endsection