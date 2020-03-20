<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date',
        'session_id',
        'type',
        'count'

    ];

    public function session()
    {
        return $this->hasOne('App\Session');
    }
}
