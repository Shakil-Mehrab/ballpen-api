<?php

namespace App\Http\Controllers\Admin\Regions;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Region\RegionResource;
use App\Models\Region;

class RegionIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke()
    {
        $regions = Region::query()
        ->with(['parent'])
        ->tree()
        ->get()
        ->toTree();

        return RegionResource::collection($regions);
    }
}
