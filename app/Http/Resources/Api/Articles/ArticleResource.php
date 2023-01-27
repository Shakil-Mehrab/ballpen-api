<?php

namespace App\Http\Resources\Api\Articles;

use App\Http\Resources\Api\Tag\TagResource;
use App\Http\Resources\Api\Meta\MetaResource;
use App\Http\Resources\Api\Topic\TopicResource;
use App\Http\Resources\Admin\Region\RegionResource;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\User\UserIndexResource;

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
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'regions' => RegionResource::collection($this->whenLoaded('regions')),
            'topics' => TopicResource::collection($this->whenLoaded('topics')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'meta' => new MetaResource($this->whenLoaded('meta')),
            'reporter' => $this->present()->reporter,
            'author' => new UserIndexResource($this->whenLoaded('user')),
        ]);
    }
}
