<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Post;
use App\QueryFilters\Active;
use App\QueryFilters\Sort;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;

class PostController extends Controller
{

    public function create()
    {
//        $channels = Channel::all();
//        $channels = Channel::orderBy('name')->get();

        return view ('post.create');
    }

    public function index()
    {
//        $posts = Post::all();
//        $posts = Post::query();

        //request is going to read the URL, is has ?active=1 or ?active=0
        //query value are the active value
//        if (request()->has('active')) {
//            $posts->where('active', request('active'));
//        }
//
//        if (request()->has('sort')) {
//            $posts->orderBy('title', request('sort'));
//        }

//        $posts = $posts->get();




        ///with pipelines//////////////////
//        $posts = app(Pipeline::class)
//            ->send(Post::query())
//            ->through([
//                Active::class,
//                Sort::class,
//            ])
//            ->thenReturn()
//            ->get();

        //refactoring, allPosts go to model as static function
        $posts = Post::allPosts();

       return view ('post.index', compact('posts'));

    }
}
