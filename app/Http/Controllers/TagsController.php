<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Tag;
use App\Library\Api\Handler AS ApiHandler;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function last(Request $request)
    {
        $limit = min(20, (int)$request->input('limit', 20));

        $api = new ApiHandler();
        $tag = Tag::take($limit)
                ->withCount([
                    'quiz' => function ($query) {
                        $query->recent()->published();
                    }
                ])
                ->get();

        if ($tag->count() > 0)
        {
            $api->setCollection($tag);
        }
        else
        {
            $api->setState(404, 'not_found');
        }

        return $api->send();
    }

    public function one(Request $request, $url)
    {
        $limit = min(20, (int)$request->input('limit', 20));

        $api = new ApiHandler();
        $tag = Tag::where('url', $url)
                ->withCount([
                    'quiz' => function ($query) {
                        $query->recent()->published();
                    }
                ])
                ->with(['quiz' => function ($q) use ($limit) {
                    $q->published()
                        ->recent()
                        ->with('user')
                        ->with('media')
                        ->take($limit);
                }])
                ->get();

        if ($tag->count() > 0)
        {
            $api->setCollection($tag);
        }
        else
        {
            $api->setState(404, 'not_found');
        }

        return $api->send();
    }
}
