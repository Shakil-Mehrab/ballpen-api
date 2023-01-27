<?php

namespace App\Http\Resources\Admin\Region;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
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
            'id' => $this->id,
            'uuid' => $this->uuid,
            'slug' => $this->slug,
            'name' => $this->name,
            'display_name' => $this->display_name,
            'parent' => new RegionResource($this->whenLoaded('parent')),
            'children' => RegionResource::collection($this->whenLoaded('children')),
        ];
    }
}
