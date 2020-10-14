@extends('layout.app')


@section('content')
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary">Log Aktivitas SIARKIM</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCard2">
      <div class="card-body">
        <div class="card-deck">

        <div class="col-md-6">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col md-5">
                  <form method="GET" action="{{ route('aktivitas.search') }}" enctype="multipart/form-data">
                  	@csrf
  					@method('post')
                  	<label for="">Pencarian Aktivitas</label>
		            <div class="input-group" style="justify-content: center;">
		              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search">
		              <div class="input-group-append">
		                <button class="btn btn-primary" type="submit">
		                  <i class="fas fa-search fa-sm"></i>
		                </button>
		               </div>
		            </div>
		          </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
		  <div class="card border-left-danger shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row align-items-center">
		        <div class="col md-2">
		        	<form method="POST" action="{{ route('aktivitas.bulan') }}" enctype="multipart/form-data">
		        	@csrf
  					@method('post')
		        	<label for="bulan">Hapus pada Bulan</label>
		        	<input type="text" class="datepicker col-md-8" id="datemonth" name="bulan" required>
		        	<button class="btn btn-danger" type="submit">
	                  <i class="fas fa-trash fa-sm"></i>
	                </button>
		        	</form>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="col-md-3">
		  <div class="card border-left-danger shadow h-100 py-2">
		    <div class="card-body">
		      <div class="row align-items-center">
		        <div class="col md-2">
		        	<form method="POST" action="{{ route('aktivitas.tahun') }}" enctype="multipart/form-data">
		        	@csrf
  					@method('post')
		        	<label for="bulan">Hapus pada Tahun</label>
		        	<input type="text" class="datepicker col-md-8" id="dateyear" name="tahun" required>
		        	<button class="btn btn-danger" type="submit">
	                  <i class="fas fa-trash fa-sm"></i>
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

	<!-- Content Row -->
	<div class="card-deck">

	<!-- Earnings (Monthly) Card Example -->
	@foreach($aktivitas as $a)
	<div class="col-12">
	  @if($a->kegiatan == "menambahkan")
	  <div class="card border-left-success shadow h-100 py-2">
	  @elseif($a->kegiatan == "mengubah")
	  <div class="card border-left-warning shadow h-100 py-2">
	  @elseif($a->kegiatan == "menghapus")
	  <div class="card border-left-danger shadow h-100 py-2">
	  @elseif($a->kegiatan == "mengunduh")
	  <div class="card border-left-primary shadow h-100 py-2">
	  @else
	  <div class="card border-left-info shadow h-100 py-2">
	  @endif
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-6">
	          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$a->nama}} {{$a->kegiatan}} {{$a->jenis}} {{$a->objek}}</div>
	          <div class="text-s font-weight-bold text-primary text-uppercase mb-1">{{ $a->created_at }}</div>
	        </div>
	        <div class="col-auto">
	            <form method="POST" action="{{ route('aktivitas.delete', $a->id) }}" enctype="multipart/form-data">
	        	@csrf
					@method('post')
	        	<button class="btn btn-danger" type="submit">
	              <i class="fas fa-trash fa-sm"></i>
	            </button>
	            <label>&nbsp;</label>
	            @if($a->jenis == "arsip")
			  <i class="fas fa-file fa-2x text-gray-300"></i>
			  @elseif($a->jenis == "kategori")
			  <i class="fas fa-calendar fa-2x text-gray-300"></i>
			  @elseif($a->jenis == "pengguna")
			  <i class="fas fa-user fa-2x text-gray-300"></i>
			  @elseif($a->jenis == "aktivitas")
			  <i class="fas fa-history fa-2x text-gray-300"></i>
			  @endif
	        	</form>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	&nbsp;
	@endforeach

  	</div>

  	&nbsp;
      <div style="display: flex; justify-content: space-around">
        {{$aktivitas->links()}}
  	  </div>

</div>
@endsection
@section('chart')
<script>
	$("#datemonth").datepicker( {
    format: "yyyy-mm",
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