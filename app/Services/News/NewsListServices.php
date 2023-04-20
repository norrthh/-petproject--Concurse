<?php

namespace App\Services\News;

use App\Models\News;
use App\Models\NewsContent;

class NewsListServices
{
    public function list(int $countNews, int $type)
    {
        if ($countNews === 1) {
            $news =  News::query()
                ->with('getContent')
                ->with('getDistrict')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $news = News::query()
                ->limit($countNews)
                ->with('getContent')
                ->with('getDistrict')
                ->orderBy('id', 'desc')
                ->get();
        }

        if ($type === 1) {
            return $this->getFilter($news);
        }

        return $news;
    }

    public function getFilter($data)
    {
//        return count($data);
        $filterNews = [];

        foreach ($data as $key => $news) {
            if ($key == 0) {
                $filterNews[] = ['indexNews' => $news];
            } else {
                $filterNews[] = ['otherNews' => $news];
            }
        }

        return $filterNews;
    }
}
