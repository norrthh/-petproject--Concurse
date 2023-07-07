<?php

namespace App\Services\News;

use App\Models\Post;

class NewsListServices
{
    public function list(int $countNews, int $type)
    {
        if ($countNews === 1) {
            $news =  Post::query()->orderBy('id', 'desc')->get();
        } else {
            $news = Post::query()->limit($countNews)->get();
        }

        return $news;
    }
}
