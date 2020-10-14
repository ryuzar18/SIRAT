<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;
use App\Pegawai;
use PDF;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function keseluruhan()
    {
    	$data = Surat::where('delete', 0)->latest('updated_at')->get();
    	$judul = "Laporan Rekapitulasi Surat Masuk dan Keluar";
    	$tanggal = Carbon::today()->format('d-m-Y');
    	$jumlah = Surat::count();
    	$pdf = PDF::loadview('laporan.keseluruhan',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])
            ->setPaper('a4', 'potrait');
    	return $pdf->download('Laporan Rekapitulasi Surat Masuk dan Keluar - '.$tanggal.'.pdf');
    }

    public function masuk()
    {
        $data = Surat::where([['delete', 0],['jenis_surat', 'Surat Masuk']])->latest('updated_at')->get();
        $judul = "Laporan Rekapitulasi Surat Masuk";
        $tanggal = Carbon::today()->format('d-m-Y');
        $jumlah = Surat::where([['delete', 0],['jenis_surat', 'Surat Masuk']])->count();
        $pdf = PDF::loadview('laporan.keseluruhan',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])
            ->setPaper('a4', 'potrait');
        return $pdf->download('Laporan Rekapitulasi Surat Masuk - '.$tanggal.'.pdf');
    }

    public function keluar()
    {
        $data = Surat::where([['delete', 0],['jenis_surat', 'Surat Keluar']])->latest('updated_at')->get();
        $judul = "Laporan Rekapitulasi Surat Keluar";
        $tanggal = Carbon::today()->format('d-m-Y');
        $jumlah = Surat::where([['delete', 0],['jenis_surat', 'Surat Masuk']])->count();
        $pdf = PDF::loadview('laporan.keseluruhan',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])
            ->setPaper('a4', 'potrait');
        return $pdf->download('Laporan Rekapitulasi Surat Keluar - '.$tanggal.'.pdf');
    }

    public function pengirim(Request $request)
    {
        $data = Surat::where([['delete', 0],['pengirim', $request->jenis]])->latest('updated_at')->get();
        $judul = "Laporan Rekapitulasi Pengirim ".$request->jenis;
        $tanggal = Carbon::today()->format('d-m-Y');
        $jumlah = Surat::where([['delete', 0],['pengirim', $request->jenis]])->count();
        $pdf = PDF::loadview('laporan.keseluruhan',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])
            ->setPaper('a4', 'potrait');
        return $pdf->download('Laporan Rekapitulasi Pengirim '.$request->jenis.'.pdf');
    }

    public function bulanan(Request $request)
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
    	$data = Surat::where('created_at',  'like', '%' . $tahun .'-' . $bulan . '%')->get();

    	$judul = "Laporan Rekapitulasi Surat Masuk dan Keluar Periode ". $nama[$bulan] .' '.$tahun;
    	$tanggal = Carbon::today()->format('d-m-Y');
    	$jumlah = Surat::where('created_at',  'like', '%' . $tahun .'-' . $bulan . '%')->count();
    	$sub = "Periode : ".$request->bulan;

    	$pdf = PDF::loadview('laporan.keseluruhan',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah]);
    	return $pdf->download('Laporan Rekapitulasi Surat Masuk dan Keluar '.$request->bulan.'.pdf');
    }

    public function tahunan(Request $request)
    {
    	$data = Surat::where('created_at',  'like', '%' . $request->tahun . '%')->get();
    	$judul = "Laporan Rekapitulasi Surat Masuk dan Keluar Tahun ".$request->tahun;
    	$tanggal = Carbon::today()->format('d-m-Y');
    	$jumlah = Surat::where('created_at',  'like', '%' . $request->tahun . '%')->count();
    	$sub = "Tahun : ".$request->tahun;
    	$pdf = PDF::loadview('laporan.keseluruhan',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah]);
    	return $pdf->download('Laporan Rekapitulasi Surat Masuk dan Keluar Tahun '.$request->tahun.'.pdf');
    }

    public function keseluruhan1()
    {
        $data = Pegawai::where('delete', 0)->latest('updated_at')->get();
        $judul = "Laporan Rekapitulasi Kepegawaian";
        $tanggal = Carbon::today()->format('d-m-Y');
        $jumlah = Pegawai::count();
        $pdf = PDF::loadview('laporan.keseluruhan1',['data'=>$data, 'judul'=>$judul, 'tanggal'=>$tanggal, 'jumlah'=>$jumlah])
            ->setPaper('a3', 'landscape');
        return $pdf->download('Laporan Rekapitulasi Kepegawaian-'.$tanggal.'.pdf');
    }

}
