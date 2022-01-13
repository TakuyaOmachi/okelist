<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
// use App\Models\Scores;
// use App\Http\Controllers\ScoresController;
use App\Http\Controllers\AuthControoler;

class PostController extends Controller
{

    private $levels = [
        'S',
        'A',
        'B',
        'C',
        'D',
        'E',
    ];

    public function home()
    {
        return view('home')
            ->with(['levels' => $this->levels]);
    }

    public function scores(Post $post)
    {
        return view('scores')
            ->with(['post' => $post]);
    }

    public function index($levels, Post $posts){

        $posts = Post::latest()->get();

        return view('posts.index')
            ->with(['posts' => $posts])
            ->with(['levels' => $levels]);
    }

    public function show(Post $post)

    {
        return view('posts.show')
            ->with(['post' => $post])
            ->with(['levels' => $this->levels]);
    }

    public function create()
    {
        return view('posts.create')
            ->with(['levels' => $this->levels]);
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->singer = $request->singer;
        $post->key = $request->key;
        $post->level = $request->level;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->save();

        return redirect()
            ->route('home');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);

    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->singer = $request->singer;
        $post->key = $request->key;
        $post->level = $request->level;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Post $post){

        $post->delete();

        return redirect()
            ->route('home');
    }

    public function search(Request $request, Post $posts)
    {
        $posts = Post::paginate(20);

        $search = $request->input('search');

        $query = Post::query();

        if($search !== null){
            $spaceConversion = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value){
                $query->where('title','like','%'.$search.'%')->orWhere('singer','like','%'.$search.'%');
            }
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('search')
            ->with(['search' => $search, 'posts' => $posts]);
    }

}

