@extends('layout.app')


@section('content')
<div class="card-deck">
	@if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
  <!-- CARD FOTO -->
  <div class="card col-md-5 col-sm-12 mb-5">
    <div class="card-header py-3 ">
      <h5 class="m-0 font-weight-bold text-primary"> Foto Profil {{$user->name}}</h5>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}">
      	@method('put')
    	@csrf
      <div style="display: flex; justify-content: center">
        <img class="img-profile rounded-circle" width="300" height="300"  src="{{ asset('storage/' .$user->foto) }}">
      </div>&nbsp;
      <div style="display: flex; justify-content: center">
      	<div class="form-group row">
	        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto Profil') }}</label>

	        <div class="col-md-8">
	            <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"autocomplete="foto">
	            <small id="emailHelp" class="form-text text-muted">Max : 8MB, hanya file jpeg,png,jpg</small>
	            @error('foto')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
	        </div>
	    </div>
      </div>
    </div>
  </div>

  <!-- CARD EDIT -->
  <div class="card shadow mb-5">
	<div class="card-header py-3">
	  <h5 class="m-0 font-weight-bold text-primary">Edit Data {{$user->name}}</h5>
	</div>
	<div class="card-body">
		    <div class="form-group row">
		        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

		        <div class="col-md-6">
		            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name">
		            <small id="emailHelp" class="form-text text-muted">Wajib Diisi</small>
		            @error('name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		    </div>

		    <div class="form-group row">
		        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

		        <div class="col-md-6">
		            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
		            <small id="emailHelp" class="form-text text-muted">Wajib Diisi</small>
		            @error('email')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		    </div>

		    <div class="form-group row">
		        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

		        <div class="col-md-6">
		        	<select id="{{ $user->role }}" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ $user->role }}" required autocomplete="role">
			            <option value="0" {{ $user->role === 0 ? 'selected' : ''}}>Admin
			            </option>
			            <option value="1" {{ $user->role === 1 ? 'selected' : ''}}>Pegawai
			            </option>
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
		        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

		        <div class="col-md-6">
		            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
		            <small id="emailHelp" class="form-text text-muted">Hanya diisi jika ingin mengganti password</small>
		            @error('password')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		    </div>

		    <div class="form-group row">
		        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

		        <div class="col-md-6">
		            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
		            <small id="emailHelp" class="form-text text-muted">Hanya diisi jika ingin mengganti password</small>
		        </div>
		    </div>

		    <div class="form-group row mb-0">
		        <div class="col-md-1 offset-md-4">
		            <button type="submit" class="btn btn-success btn-user btn-sm">
		                {{ __('Perbarui') }}
		            </button>
		        </div>
		    </div>


		</form>
	</div>
	</div>

</div>
@endsection