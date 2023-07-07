<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeInformationController extends Controller
{
    public function information()
    {
        return [
            'countPost' => Post::query()->count()
        ];
    }
}
