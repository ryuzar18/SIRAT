<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable =[
        'no', 'nip', 'nama_lengkap','pangkat','jabatan', 'eselon','unit_kerja',
        'masa_kerja','tanggal_lahir','tempat_lahir', 'email','no_hp','nama_ayah','nama_ibu',
        'SK_CPNS','SK_PNS','gaji','status_perkawinan','sumpah','delete'
    ];
}
