<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $dates = ['date'];

    public function status()
    {
    	return $this->belongsTo('App\SaleStatus');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
