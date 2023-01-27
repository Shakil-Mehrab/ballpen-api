<?php

namespace App\Http\Resources\Api\Meta;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Admin\Images\ThumbnailResource;

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
            'id' => $this->id,
            'meta_title' => $this->title,
            'meta_subtitle' => $this->description,
            'meta_thumbnail' =>  new ThumbnailResource($this->image),
        ];
    }
}
