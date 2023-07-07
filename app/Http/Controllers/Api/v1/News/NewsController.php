<?php

namespace App\Http\Controllers\Api\v1\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\News\NewsCreateRequest;
use App\Http\Requests\v1\News\NewsIndexRequest;
use App\Models\News;
use App\Models\NewsContent;
use App\Models\Post;
use App\Services\News\NewsCreateServices;
use App\Services\News\NewsListServices;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsIndexRequest $request, NewsListServices $services)
    {
        return $services->list($request->integer('count'), $request->integer('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(NewsCreateRequest $request, NewsCreateServices $services)
    {
        return $services->create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Post::query()->where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
