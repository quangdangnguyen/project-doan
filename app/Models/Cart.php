<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'product';
    protected $fillable = ['name','slug','image','price','sale_price','content','category_id','status'];
}
