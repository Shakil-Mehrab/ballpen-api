<?php

namespace App\Http\Resources\Admin\Pinned;

use Illuminate\Http\Resources\Json\JsonResource;

class PinnedIndexResource extends JsonResource
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
            'article_id' => $this->id ?? null,
            'title' => $this->title ?? null,
        ];
    }
}
