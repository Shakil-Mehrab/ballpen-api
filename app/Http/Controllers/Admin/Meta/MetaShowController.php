<?php

namespace App\Http\Controllers\Admin\Meta;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Meta\MetaResource;
use App\Models\Meta;

class MetaShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Meta $meta)
    {
        return new MetaResource($meta);
    }
}
