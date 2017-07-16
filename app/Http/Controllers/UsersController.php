<?php

namespace App\Http\Controllers;

use App\User;
use App\Quiz;
use App\Library\Api\Handler AS ApiHandler;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function one(Request $request, $login)
    {
        $limit = min(20, (int)$request->input('limit', 20));

        $api = new ApiHandler();
        $user = User::where('login', $login)
                ->withCount([
                    'quiz' => function ($query) {
                        $query->recent()->published();
                    }
                ])
                ->with(['quiz' => function ($q) use ($limit) {
                    $q->published()
                        ->recent()
                        ->with('media')
                        ->take($limit);
                }])
                ->with('media')
                ->get();

        if ($user->count() > 0)
        {
            $api->setCollection($user);
        }
        else
        {
            $api->setState(404, 'not_found');
        }

        return $api->send();
    }
}
