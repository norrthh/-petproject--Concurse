<?php

namespace App\Http\Controllers\Api\v1\Information;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class HomeInformationController extends Controller
{
    public function information()
    {
        return [
            'countPost' => News::query()->count()
        ];
    }
}
