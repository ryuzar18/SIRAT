<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    protected $fillable =[
        'no_surat', 'no_agenda', 'jenis_surat','tanggal_kirim', 'tanggal_terima','pengirim','perihal','no_disposisi', 'no_berangkas', 'file','delete'
    ];
}
