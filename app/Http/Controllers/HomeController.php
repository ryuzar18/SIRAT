<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Surat;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $now = Carbon::now()->year;
        $pegawai = Pegawai::count();
        $masuk = Surat::where('jenis_surat', 'Surat Masuk')->count();
        $keluar = Surat::where('jenis_surat', 'Surat Keluar')->count();

        //data buat area chart
        $areasurat = array();
        $areapegawai = array();
        $bulan = ['01','02','03','04','05','06','07','08','09','10','11','12'];

        foreach ($bulan as $b) {
            $areasurat[]=Surat::where('updated_at',  'like', '%' . '2020-' . $b . '%')->count();
        }

        foreach ($bulan as $b) {
            $areapegawai[]=Pegawai::where('updated_at',  'like', '%' . '2020-' . $b . '%')->count();
        }

        return view('dashboard', compact('now', 'pegawai', 'masuk', 'keluar', 'areasurat', 'areapegawai', 'bulan'));   
    }

    public function home()
    {
        return view('welcome');
    }
}
