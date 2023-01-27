<?php

namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Images\ThumbnailResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke()
    {
        $media = Media::query()
        ->latest('id')->with('model')
        ->paginate(request('per-page', 10));

        return ThumbnailResource::collection($media);
    }
}
