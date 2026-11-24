<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $guarded = [];
    //
     public function guru()
    {
        return $this->belongsTo(Guru::class,'nip','nip');
    }

    // public function jenisCuti()
    // {
    //     return $this->belongsTo(JenisCuti::class,'id_cuti','id');
    // }
}
