//Controller
public function bulanan1(Request $request)
    {
    	$bulan = substr($request['bulan'],0,2);
    	$tahun = substr($request['bulan'],3,4);

        $nama = [
            "01" => "Januari",
            "02" => "Februari",
            "03" => "Maret",
            "04" => "April",
            "05" => "Mei",
            "06" => "Juni",
            "07" => "Juli",
            "08" => "Agustus",
            "09" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember",
        ];
    	$data = Pegawai::where('created_at',  'like', '%' . $tahun .'-' . $bulan . '%')->get();

    	$judul = "Laporan Rekapitulasi Kepegawaian Periode ". $nama[$bulan] .' '.$tahun;
    	$tanggal = Carbon::today()->format('d-m-Y');
    	$jumlah = Pegawai::where('created_at',  'like', '%' . $tahun .'-' . $bulan . '%')->count();
    	$sub = "Periode : ".$request->bulan;

        $pdf = PDF::loadview('laporan.keseluruhan1',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])->setPaper('a3', 'landscape');
        
    	return $pdf->download('Laporan Rekapitulasi Kepegawaian Periode '.$request->bulan.'.pdf');
    }

    public function tahunan1(Request $request)
    {
    	$data = Pegawai::where('created_at',  'like', '%' . $request->tahun . '%')->get();
    	$judul = "Laporan Rekapitulasi Kepegawaian Tahun ".$request->tahun;
    	$tanggal = Carbon::today()->format('d-m-Y');
    	$jumlah = Pegawai::where('created_at',  'like', '%' . $request->tahun . '%')->count();
    	$sub = "Tahun : ".$request->tahun;
    	$pdf = PDF::loadview('laporan.keseluruhan1',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])->setPaper('a3', 'landscape');
    	return $pdf->download('Laporan Rekapitulasi Kepegawaian Tahun '.$request->tahun.'.pdf');
    }

//    public function pegawai()
//    {
//      $data = Pegawai::where('delete', 0)->latest('updated_at')->get();
//        $judul = "Data Pegawai";
//        $tanggal = Carbon::today()->format('d-m-Y');
//        $jumlah = Pegawai::count();
//        $pdf = PDF::loadview('laporan.pegawai',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])
//            ->setPaper('a4', 'potrait');
//        return $pdf->download('Data Pegawai-'.$tanggal.'.pdf');
//    }

//Index
<div class="collapse show" id="collapseCard2">
      <div class="card-body">
        <div class="card-columns">
          <div class="">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
               <div class="row align-items-center">
                <div class="col md-2">
                  <form method="GET" action="{{ route('laporan.keseluruhan1') }}" enctype="multipart/form-data">
                  @csrf
                @method('GET')
                  <label for="bulan">Laporan Keseluruhan</label>
                  <div style="display: flex; justify-content: left;">
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
                  <form method="GET" action="{{ route('laporan.bulanan1') }}" enctype="multipart/form-data">
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
                  <form method="GET" action="{{ route('laporan.tahunan1') }}" enctype="multipart/form-data">
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