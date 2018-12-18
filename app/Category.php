<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
  protected $primaryKey = 'cat_id';
  protected $fillable = ['cat_id', 'name'];



    public function products()
    {
      return $this->hasMany('App\Product', 'id');    
    }
}
