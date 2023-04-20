<?php

namespace App\Http\Controllers\Api\v1\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\News\NewsCreateRequest;
use App\Http\Requests\v1\News\NewsIndexRequest;
use App\Models\News;
use App\Models\NewsContent;
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
    public function create(NewsCreateRequest $request)
    {
        News::query()->create([
            'district_id' => 1,
            'name' => '',
            'author' => auth()->user()->id,
            'nameTAT' => '',
            'nameRU' => $request->input('namePost')
        ]);

        NewsContent::query()->create([
            'post_id' => News::query()->orderBy('id', 'desc')->first()->id,
            'text' => $request->input('informationPost'),
            'textRU' => $request->input('informationPost'),
            'textTAT' => $request->input('informationPost'),
            'img_big' => $request->input('images1'),
            'img_small_1' => $request->input('images2'),
            'img_small_2' => $request->input('images3'),
            'images' => 'delete'
        ]);

        return response()->json([
            'message' => 'Новость успешно создалась',
        ], 200);
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
        return News::query()->where('id', $id)->with('getContent')->get();
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
