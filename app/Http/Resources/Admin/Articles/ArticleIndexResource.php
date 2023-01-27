<?php

namespace App\Http\Resources\Admin\Articles;

use App\Http\Resources\Admin\Category\CategoryResource;
use App\Http\Resources\Admin\Images\ThumbnailResource;
use App\Http\Resources\Admin\User\UserIndexResource;
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
            'reporter' => $this->reporter,
            'teaser' => $this->teaser,
            'pinned' => $this->pinned,
            'hightlighted' => $this->hightlighted,
            'status' => $this->status,
            'archived' => (bool) $this->deleted_at,
            'created_at_humans' => $this->humansDatetime,
            'formatted_date_time' => $this->formattedDatetime,
            'thumbnails' => new ThumbnailResource($this->whenLoaded('thumbnail')),
            'user' => new UserIndexResource($this->whenLoaded('user')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),

        ];
    }
}
