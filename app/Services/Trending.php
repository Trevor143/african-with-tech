<?php


namespace App\Services;


use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class Trending
{
    public function week($limit = 5)
    {
        return $this->getResults(1);
    }

    protected function getResults($days, $limit=5)
    {
        $data = Analytics::fetchMostVisitedPages(Period::days($days), $limit + 4);
        return $this->parseResults($data, $limit);
    }

    protected function parseResults($data, $limit)
    {
        return $data->reject(function($item){
            return $item['url'] == '/' or
                $item['url'] == '/www.africanwith.tech' or
                starts_with($item['url'], '/category');
        })->unique('url')->transform(function($item){
            $item['pageTitle'] = str_replace(' - african_with_tech', '', $item['pageTitle']);
            $item['url'] = str_replace('/article/', '', $item['url']);
            return $item;
        })->splice(0, $limit);
    }
}
