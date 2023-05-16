<?php

namespace App\Models;

use App\QueryFilters\Active;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Pipeline;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comment()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    public static function allPosts()
    {
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([
                Active::class,
                Sort::class,
                MaxCount::class,
            ])
            ->thenReturn()
            ->paginate(5);//can use paginate
        //if use paginate, to keep the query in the url
        //use $posts->appends(request()->input())->links() on the paginate
//            ->get();

    }
}
