<?php

namespace App\Http\Controllers\Api\v1\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\News\NewsCreateMessageRequest;
use App\Models\NewsComments;
use App\Services\News\NewsCreateCommentsServices;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(NewsCreateMessageRequest $request, NewsCreateCommentsServices $services)
    {
        return $services->create($request->validated());
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
        return NewsComments::query()
            ->where([['post_id', $id]])
            ->orderBy('id', 'desc')
            ->with('getUsers')
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
