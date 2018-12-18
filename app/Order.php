<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
  protected $table = 'orders';
  protected $primaryKey = 'order_id';
  protected $fillable = ['order_id', 'user_id', 'prod_id', 'quantity'];


    public function user()
    {
      return $this->belongsTo('App\User', 'id');    
    }
    public function products()
    {
      return $this->hasMany('App\Product', 'id');    
    }
}
