<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Surat;
use Auth;
use Storage;

class SuratController extends Controller
{
    public function index()
    {
        $items = Surat::where('delete', 0)->latest('updated_at')->get();
        $kategori = Surat::select('pengirim')->distinct('pengirim')->get();
        return view('surat.index', compact('items','kategori'));        
    }

   	public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {   
        $data = $request->all();
        $data['delete'] = 0;

        $this->validate($request,[
            'file' => ['mimes:jpeg,png,jpg,pdf'],
            'no_surat' =>['required', 'unique:surat', 'max:255'],
        ]);

        $name = $request->file('file')->getClientOriginalName();
        $file = $request->file('file')->storeAs('surat/', $name, 'public');
        $data['file'] = $name;
        Surat::create($data);

        return redirect()->route('surat.index')->with('success', 'Tambah data surat berhasil');
    }

    public function edit($id)
    {
        $items = Surat::findOrFail($id);

        return view('surat.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $items = Surat::findOrFail($id);
        $data = $request->all();
        
        if ($request->file('file')) {
            $this->validate($request,[
                'file' => ['mimes:jpeg,png,jpg,pdf'],
            ]);
            if ($items->file && file_exists(storage_path('app/public/surat/'.$items->file))) {
                Storage::delete('public/surat/'.$items->file);
            }
            $name = $request->file('file')->getClientOriginalName();
            $file = $request->file('file')->storeAs('surat/', $name, 'public');
            $data['file'] = $name;
        }

        $items->update($data);
        return redirect()->route('surat.index')->with('success', 'Edit data surat berhasil');
    }

    public function destroy($id)
    {
        $items = Surat::findOrFail($id);
        $items->delete = 1;
        $items->save(); 
        return redirect()->route('surat.index')->with('success', 'Hapus data surat berhasil');
    }
    public function delete($id)
    {
        $items = Surat::findOrFail($id);
        $items->delete();
        Storage::delete('public/surat/'.$items->file);
        return redirect()->route('surat.index')->with('success', 'Data berhasil dihapus');
    }
}
