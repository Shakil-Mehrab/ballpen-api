<?php

namespace App\Http\Controllers\Admin\Pinned;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Http\Request;

class PinnedUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'selectedArticle1' => 'nullable',
            'selectedArticle2' => 'nullable',
            'selectedArticle3' => 'nullable',
            'selectedArticle4' => 'nullable',
            'selectedArticle5' => 'nullable',
            'selectedArticle6' => 'nullable',
            'selectedArticle7' => 'nullable',
            'selectedArticle8' => 'nullable',
            'selectedArticle9' => 'nullable',
            'selectedArticle10' => 'nullable',
            'selectedArticle11' => 'nullable',
        ]);

        for ($i = 1; $i <= 11; $i++) {
            $pinned = Pin::findOrfail($i);

            if ($pinned) {
                $value = 'selectedArticle'.$i;
                $pinned->update([
                    'article_id' => $request->$value ?? null,
                ]);
            }
        }

        return $pinned;
    }
}
