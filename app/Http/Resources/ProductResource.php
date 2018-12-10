<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price_per_unit' => $this->price_per_unit,
            'unit' => $this->unit,
            'currency' => $this->currency,
            'weight' => $this->weight,
            'weight_unit' => $this->weight_unit,
            'manufactured_in' => $this->manufactured_in,
            'stock' => $this->stock,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'extra_description' => $this->extra_description,
            'categories' => $this->categories,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
