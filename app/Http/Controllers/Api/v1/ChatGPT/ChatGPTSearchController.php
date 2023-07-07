<?php

namespace App\Http\Controllers\Api\v1\ChatGPT;

use App\Http\Controllers\Controller;
use App\Services\ChatGPT\ChatGPTSearchServices;
use Illuminate\Http\Request;

class ChatGPTSearchController extends Controller
{
    public function search(Request $request, ChatGPTSearchServices $services)
    {
        return $services->search($request->all());
    }
}
