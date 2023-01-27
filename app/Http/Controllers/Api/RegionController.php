<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Region\RegionTreeResource;
use App\Models\Region;

class RegionController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $regions = Region::tree()
            ->get()
            ->toTree();

        return RegionTreeResource::collection($regions);
    }

    /**
     * show
     *
     * @param  mixed  $region
     * @return void
     */
    public function show(Region $region)
    {
        $region->load(['children', 'children.children', 'children.children.children']);

        return new RegionTreeResource($region);
    }
}
