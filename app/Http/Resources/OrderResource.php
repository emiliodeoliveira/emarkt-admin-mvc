<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderResource extends Resource
{

    public function toArray($request)
    {
        return [
            'order_id' => $this->order_id,
            'prod_id' => $this->prod_id,
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
          ];    }
}
