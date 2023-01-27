<?php

namespace App\Http\Resources\Admin\Articles;

use App\Http\Resources\Admin\Metas\MetaResource;
use App\Http\Resources\Admin\Region\RegionResource;
use App\Http\Resources\Admin\Tag\TagResource;
use App\Http\Resources\Admin\Topic\TopicResource;

class ArticleResource extends ArticleIndexResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'content' => $this->content,
            'regions' => RegionResource::collection($this->whenLoaded('regions')),
            'topics' => TopicResource::collection($this->whenLoaded('topics')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'meta' => new MetaResource($this->whenLoaded('meta')),
        ]);
    }
}
