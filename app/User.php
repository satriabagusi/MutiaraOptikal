<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;




class User extends Authenticatable
{

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

    use Notifiable;

    

    protected $fillable = [
        'username',
        'password',
        'name',
        'user_role',
    ];
}
