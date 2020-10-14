<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pegawai;
use Auth;

class PegawaiController extends Controller
{
    public function index()
    {
        $items = Pegawai::where('delete', 0)->latest('updated_at')->get();
        return view('pegawai.index', compact('items'));        
    }

   	public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {   
        $data = $request->all();
        $data['delete'] = 0;

        $this->validate($request,[
            'nip' =>['required', 'unique:pegawai', 'max:255'],
        ]);

        Pegawai::create($data);
        return redirect()->route('pegawai.index')->with('success', 'Tambah data Pegawai berhasil');
    }

    public function edit($id)
    {
        $items = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $items = Pegawai::findOrFail($id);
        $data = $request->all();
        $items->update($data);
        return redirect()->route('pegawai.index')->with('success', 'Edit data Pegawai berhasil');
    }

    public function destroy($id)
    {
        $items = Pegawai::findOrFail($id);
        $items->delete = 1;
        $items->save(); 
        return redirect()->route('pegawai.index')->with('success', 'Hapus data Pegawai berhasil');
    }
}
