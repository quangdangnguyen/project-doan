<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";

    public function BillDetail() {
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }

    public function Customer() {
    	return $this->belongsTo('App\Customer','id_customer','id');
    }


    public function cus() {
    	return $this->hasOne(Customer::class,'id','id_customer');
    }
}
