<?php

namespace App\Http\Resources\Admin\Metas;

use Illuminate\Http\Resources\Json\JsonResource;

class MetaResource extends JsonResource
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
            'title' => $this->title,
            'url' => $this->url,
            'type' => $this->type,
            'image_id' => $this->image_id,
            'image' => $this->image?->getUrl(),
            'description' => $this->description,
        ];
    }
}
