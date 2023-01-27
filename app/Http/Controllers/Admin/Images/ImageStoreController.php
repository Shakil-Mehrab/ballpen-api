<?php

namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Images\ThumbnailResource;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'mimes:png,jpg,jpeg,jif,webp'],
            'cropWidth' => ['required', 'numeric'],
            'cropHeight' => ['required', 'numeric'],
            'cropX' => ['required', 'numeric'],
            'cropY' => ['required', 'numeric'],
            'thumbnail' => 'max:10240',
        ], [
            'thumbnail.max' => 'Image must not grater thsn 10MB',
        ]);

        $thumb = InterventionImage::make($request->file('thumbnail'));
        $thumb->crop(
            (int) $request->cropWidth,
            (int) $request->cropHeight,
            (int) $request->cropX,
            (int) $request->cropY
        )->resize(600, 358)->encode('data-url');

        // $name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $request->file('thumbnail')->getClientOriginalName()) . '.webp';
        $name = $request->name.'.webp';

        $media = $request->user()
            ->addMediaFromBase64($thumb)
            ->usingFileName($name)
            ->preservingOriginal()
            ->toMediaCollection();

        return new ThumbnailResource($media);
    }
}
