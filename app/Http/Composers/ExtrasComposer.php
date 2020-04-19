<?php


namespace App\Http\Composers;

use App\Article;
use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class ExtrasComposer
{
    public function compose(View $view)
    {
        $tags = Tag::all();
        $trends = app('App\Services\Trending')->week();
        $latestArticles = new Collection();
//        $latestArticles = Article::all()->take(4);

        foreach ($trends as $trend) {
            $url = $trend['url'];
            $article = Article::findBySlug($url);
            $latestArticles->push($article);
        }

        $view
            ->with('tags', $tags)
            ->with('articles', $latestArticles);
    }
}
