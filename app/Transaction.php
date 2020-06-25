<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable= [
        'no_transaksi',
        'lens_type',
        'bpjs_status',
        'lens_price',
        'total_pay',
        'total_transaction',
        'transaction_status',
        'keterangan',
        'id_user',
        'id_patient',
        'id_frame',
        'updated_by',
        'taken_status',
    ];

    public function patient(){
        return $this->belongsTo('App\Patient', 'id_patient');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function frame_type(){
        return $this->belongsTo('App\Frame_type', 'id_frame' );
    }

    public function frame_brand(){
        return $this->belongsTo('App\Frame_brand');
    }
}
