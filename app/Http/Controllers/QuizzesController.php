<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Library\Api\Handler AS ApiHandler;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function last(Request $request)
    {
        $from = (int)$request->input('from', null);
        $limit = (int)$request->input('limit', 10);
        $fromPrev = $from - $limit > 0 ? $from - $limit: null;

        $quizzes = Quiz::take($limit)->recent()->published()
                        ->with('user')
                        ->with('media');
        if ($from > 0)
            $quizzes->skip($from);

        $quizzes = $quizzes->get();

        $api = new ApiHandler();
        $api->setCollection($quizzes)
            ->isCollection();


        $api->addLink('self', route('get_quizzes', ['from' => $fromPrev, 'limit' => $limit]));
        if ($quizzes->count() === $limit)
            $api->addLink('next', route('get_quizzes', ['from' => $quizzes->last()->getKey(), 'limit' => $limit]));
        if ($from)
            $api->addLink('prev', route('get_quizzes', ['from' => $fromPrev, 'limit' => $limit]));

        return $api->send();
    }

    public function one($id)
    {
        $quizzes = Quiz::where('quiz_id', (int)$id)
                        ->published()
                        ->with('user')
                        ->with('questions')
                        ->with('results')
                        ->with('media')
                        ->with('tags')
                        ->get();

        $api = new ApiHandler();

        if ($quizzes->count() > 0)
            $api->setCollection($quizzes);
        else
            $api->setState(404, 'not_found');

        return $api->send();
    }
}
