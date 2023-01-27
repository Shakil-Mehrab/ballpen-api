<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Models\Topic;

class TopicDestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Topic $topic)
    {
        $topic->delete();

        return response()->json(['success' => true], 200);
    }
}
