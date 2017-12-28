<?php

namespace App\Http\Controllers;

use App\User;
use App\Quiz;
use App\Library\Api\Handler AS ApiHandler;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function one(Request $request, $id)
    {
        $api = new ApiHandler();
        $user = User::where('user_id', $id)
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
