<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frame_brand extends Model
{
    public function frame_type(){
        return $this->hasMany('App\Frame_type');
    }

    public function transaction(){
        return $this->hasManyThrough('App\Transaction', 'App\Frame_type');
    }

    protected $fillable = [
        'frame_brand',
    ];
}
