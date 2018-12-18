<?php
  
namespace App;
use App\Category;
use App\Order;

use Illuminate\Database\Eloquent\Model;
   
class Product extends Model
{

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name', 'description', 'price', 'created_at','updated_at' ];


    public function order()
    {
      return $this->hasMany('App\Order', 'order_id');
    }

    public function categories()
    {
      return $this->belongsTo('App\Category','cat_id');
    }

    public function show(Product $product)
    {
      return new ProductResource($product);
    }



}