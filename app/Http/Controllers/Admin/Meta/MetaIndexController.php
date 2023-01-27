<?php

namespace App\Http\Controllers\Admin\Meta;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Meta\MetaResource;
use App\Models\Meta;

class MetaIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke()
    {
        $topics = Meta::query()
            ->latest('id')
            ->paginate(request('per-page', 10));

        return MetaResource::collection($topics);
    }
}
