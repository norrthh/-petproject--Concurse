<?php

namespace App\Services\News;

use App\Models\News;
use App\Models\NewsComments;
use Illuminate\Http\JsonResponse;

class NewsCreateCommentsServices
{
    public function create($data): JsonResponse
    {
        if ($this->checkPost($data['post_id'])) {

            $this->createComments($data);
            return response()->json([
                'message' => 'Вы успешно оставили комментарии'
            ], 200);

        } else {
            return response()->json([
                'message' => 'wtf?'
            ], 401);
        }
    }

    protected function createComments($data): void
    {
        NewsComments::query()->create([
            'user_id' => auth()->user()->id,
            'message' => $data['comments'],
            'post_id' => $data['post_id'],
        ]);
    }

    protected function checkPost($post_id): bool
    {
        return (bool) News::query()->where([['id', $post_id]])->first();
    }
}
