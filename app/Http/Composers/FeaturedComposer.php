<?php


namespace App\Http\Composers;

use App\Article;
use App\Tag;
use Illuminate\View\View;

class FeaturedComposer
{
    public function compose(View $view)
    {
        $main_article = Article::where('post_type', 1)->first();
        $up_article = Article::where('post_type', 2)->first();
        $down_article = Article::where('post_type', 3)->first();

        $view
            ->with('main_article', $main_article)
            ->with('up_article', $up_article)
            ->with('down_article', $down_article);
    }
}
