<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemSingleResource extends JsonResource
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
            'coloroption_id' => $this->coloroption_id,
            'weightoption_id'  => $this->weightoption_id,
            'sizeoption_id' => $this->sizeoption_id,
            'brand_id' => $this->brand_id,        
            'categoryitem_id'  => $this->categoryitem_id,
            'in_stock' => $this->in_stock
        ];
    }
}
