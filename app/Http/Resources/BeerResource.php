<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //  dd($this->resource);
        return [
            'id' => $this->resource->id,
            'name' => $this->name,
            'description' => $this->name,
            'image_url' => $this->image_url,
            'ingredients' => $this->ingredients
        ];
    }
}
