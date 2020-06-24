<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame_type extends Model
{
    public function transaction(){
        return $this->hasmany('App\Transaction');
    }

    public function frame_brand(){
        return $this->belongsTo('App\Frame_brand', 'id_brand');
    }

    protected $fillable = [
        'frame_type',
        'id_brand',
        'stock',
        'price'

    ];

}
