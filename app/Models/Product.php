<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','slug','id_type','image','unit_price','promotion_price','description','unit','new','action'];
}
