<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function poly()
    {
        echo "<pre>";
        $post = Post::first();

        var_dump($post);

        $poly = $post->image()->create([
           'url' => 'some/image.jpg'
        ]);
        echo "<hr>";
        var_dump($poly);


        $user = User::first();
        $polyB = $user->image()->create([
           'url' => 'some/image.jpg'
        ]);
        echo "<hr>";
        var_dump($polyB);



        $polyC = $post->comment()->create([
            'body' => 'first comment'
        ]);
        echo "<hr>";
        var_dump($polyC);

        $video = Video::first();
        $polyD = $video->comment()->create([
            'body' => 'video comment'
        ]);
        echo "<hr>";
        var_dump($polyD);

        $polyF = $post->tags()->create([
            'name' => 'Laravel'
        ]);
        $polyF = $video->tags()->create([
            'name' => 'Laravel'
        ]);

        $polyF = $user->tags()->create([
            'name' => 'Laravel'
        ]);
        echo "<hr>";
        var_dump($polyF);

    }
}
