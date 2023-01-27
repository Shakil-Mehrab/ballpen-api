<?php

namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Images\ThumbnailResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Media $media)
    {
        return new ThumbnailResource($media);
    }
}
