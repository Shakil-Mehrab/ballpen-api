<?php

namespace App\Http\Resources\Admin\Region;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionTreeResource extends JsonResource
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
            'local_name' => $this->local_name,
            'parent_id' => $this->parent_id,
            'children' => RegionTreeResource::collection($this->children),
        ];
    }
}
