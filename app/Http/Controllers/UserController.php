<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Aktivitas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::latest('updated_at')->get();

        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'name' => ['required', 'string', 'max:255'],
            'role' => ['required'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "foto" => 'required','file|image|mimes:jpeg,png,jpg',
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);

        $name = $request->file('foto')->getClientOriginalName();
        $file = $request->file('foto')->storeAs('profil', $name, 'public');
        $data['foto'] = $file;
        
        User::create($data);

       	return redirect()->route('users.index')->with('success', 'Tambah data pengguna berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
    		'name' => ['required', 'string', 'max:255'],
    		'role' => 'required',
            'email' => 'required', 'string', 'email', 'max:255',
            "foto" => 'file|image|mimes:jpeg,png,jpg',
            'password' => ['confirmed'],
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        
        if (!$request->get('password') == '') {
            $user->password = Hash::make($request['password']);
        }

        // Cek user upload foto profil atau gak
        if ($request->file('foto')) {
            // Cek sebelumnya user sudah punya foto profil atau gak
            if ($user->foto && file_exists(storage_path('app/public/'.$user->foto))) {
                // Kalau punya, hapus foto profil sebelumnya
                Storage::delete('public/'.$user->foto);
            }
            $name = $request->file('foto')->getClientOriginalName();
            $file = $request->file('foto')->storeAs('profil', $name, 'public');
            $user->foto = $file;
        }

        $user->save();
        return redirect()->route('users.index')->with('success', 'Edit data pengguna berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Storage::delete('public/'.$user->foto);
        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
    }
}
