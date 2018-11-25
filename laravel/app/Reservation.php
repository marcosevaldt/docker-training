<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function status()
    {
    	return $this->belongsTo('App\ReservationStatus', 'status_id');
    }

    public function sale()
    {
    	return $this->belongsTo('App\Sale');
    }
}
