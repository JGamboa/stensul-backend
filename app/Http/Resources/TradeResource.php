<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'user_id' => (int) $this->user_id,
            'symbol' => $this->symbol,
            'shares' => (int) $this->shares,
            'price' => (int) $this->price,
            'timestamp' => (int) $this->timestamp
        ];
    }
}
