<?php

use App\Product;

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{ 
    public function toArray($request)
    {
    return [
        'id' => $request->id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
      ];


    }
}
