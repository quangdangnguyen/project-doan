<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

     public function bill() {
    	return $this->hasMany('App\Bill','id_customer','id');
    }

    public function order_list() {
    	return $this->hasMany(Bill::class,'id_customer','id');
    }
}
