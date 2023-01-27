<?php

namespace App\Http\Resources\Admin\Images;

use App\Http\Resources\Admin\User\UserIndexResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ThumbnailResource extends JsonResource
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
            'name' => $this->file_name,
            'original' => $this->getUrl(),
            'size' => $this->HumanReadableSize,
            // 'user' => new UserIndexResource($this->model),
            'created_at_date' => $this->created_at->toDateString(),
            'created_at_humans' => $this->created_at->diffForHumans(),
        ];
    }
}
