<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Scores;

class ScoresController extends Controller
{
    public function store(Request $request, Post $post){

        $request->validate([
            'body' => 'required',
        ]);

        $score = new Scores();
        $score->post_id = $post->id;
        $score->body = $request->body;
        $score->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Scores $scores){
        $scores->delete();

        return redirect()
            ->route('posts.show', $scores->post);
    }

    public function scores(Scores $scores)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $score = new Scores();
        $score->post_id = $post->id;
        $score->body = $request->body;
        $score->save();

        return view('scores')
            ->with(['post' => $post])
            ->with(['score' => $score]);
    }
}
