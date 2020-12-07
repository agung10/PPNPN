<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DataPelamar extends Model
{
    public function jabatan(){
        return $this->belongsTo('App\Model\Jabatan', 'jabatan_id');
    }

    // public function pendidikan(){
    //     return $this->belongsTo('App\Pendidikan', 'pendidikan_id');
    // }
}
