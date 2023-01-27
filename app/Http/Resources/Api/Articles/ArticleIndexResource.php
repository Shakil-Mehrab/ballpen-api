<?php

namespace App\Http\Resources\Api\Articles;

use App\Http\Resources\Admin\Images\ThumbnailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleIndexResource extends JsonResource
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
            'title' => $this->title,
            'kicker' => $this->kicker,
            'category' => $this->categories->pluck('name')->join(', '),
            'teaser' => $this->teaser,
            'thumbnail' => new ThumbnailResource($this->whenLoaded('thumbnail')),
            'formatted_date_time' => $this->present()->formattedDatetime,
            'created_at_humans' => $this->present()->humansDatetime,
        ];
    }
}
