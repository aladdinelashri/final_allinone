<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id'  => $this->id,
            'Name' => $this->Name,
            'Size' => $this->Size,
            'Weight' => $this->Weight,
            'Color'   => $this->Color,
            'Note'   => $this->Note,
            'coloroption' => $this->coloroption,
            'weightoption'  => $this->weightoption,
            'sizeoption' => $this->sizeoption,
            'brand' => $this->brand,        
            'categoryitem'  => $this->categoryitem,
            'in_stock' => $this->in_stock
        ];
    }
}
