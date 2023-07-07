<?php

namespace App\Services\News;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class NewsCreateServices
{
    public function create(array $data)
    {
        $this->store($data['namePost'], $data['informationPost'], $this->filterImg($data['img']));

        return response()->json([
            'message' => 'Вы успешно создали пост'
        ], 200);
    }

    protected function store(string $title, string $text, array $photos)
    {
        Post::query()->create([
            'user_id' => Auth::user()->id,
            'title' => $title,
            'text' => $text,
            'textTT' => $text,
            'photos' => json_encode($photos)
        ]);
    }

    protected function filterImg(array $data)
    {
        $photos = [];

        for ($i = 1; $i <= count($data); $i++) {
            $photos[] = $data[$i];
        }

        return $photos;
    }
}
