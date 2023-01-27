<?php

namespace App\Http\Controllers\Admin\Images;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageDestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Media $media)
    {
        $path = public_path().Str::remove(env('APP_URL'), $media->getUrl());

        if (File::exists($path)) {
            $media->delete();
            unlink($path);

            return response()->json(['success' => 'Data deleted and image unlinked'], 200);
        } else {
            $media->delete();

            return response()->json(['success' => 'Only data row deleted'], 200);
        }

        return response()->json(['error' => true], 404);
    }
}
