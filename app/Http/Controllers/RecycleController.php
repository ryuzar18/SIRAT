<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;
use App\Pegawai;
use Auth;
use App\Aktivitas;

class RecycleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Surat::where('delete', 1)->get();
        return view('recycle.index', ['items' => $items]);
    }

    public function restore($id)
    {
        $items = Surat::findOrFail($id);
        $items->delete = 0;
        $items->save();
        return redirect()->route('recycle.index')->with('success', 'Data berhasil dipulihkan');
    }

    public function delete($id)
    {
        $items = Surat::findOrFail($id);
        unlink(storage_path("app/public/surat/".$items->file));
        $items->delete();
        return redirect()->route('recycle.index')->with('success', 'Data berhasil dihapus');
    }

    public function index1()
    {
        $items = Pegawai::where('delete', 1)->get();
        return view('recycle.pegawai', ['items' => $items]);
    }

    public function restore1($id)
    {
        $items = Pegawai::findOrFail($id);
        $items->delete = 0;
        $items->save();
        return redirect()->route('recycle.pegawai')->with('success', 'Data berhasil dipulihkan');
    }

    public function delete1($id)
    {
        $items = Pegawai::findOrFail($id);
        $items->delete();
        return redirect()->route('recycle.pegawai')->with('success', 'Data berhasil dihapus');
    }


}
