<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }

    protected $fillable= [
        'nama_pasien',
        'no_hp',
        'no_bpjs',
    ];
}
