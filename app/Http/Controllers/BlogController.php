<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Models\BackpackUser;
use App\Tag;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('status', 'PUBLISHED')->orderBy('created_at', 'desc')->get();

        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Know it even when it doesnt help');
        SEOMeta::setCanonical(Url::current());

        return view('blog.index')->with('articles', $articles);
    }

    /**
     * Display a listing of the category.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        $this->generalSEO($category);
        return view('blog.category')
            ->with('articles', $category->articles->where('status','PUBLISHED')->sortByDesc('created_at'))
            ->with('category', $category);
    }

    /**
     * Display a listing of the tags.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function tag(Tag $tag)
    {
        $this->generalSEO($tag);
        return view('blog.category')
            ->with('articles', $tag->articles->where('status','PUBLISHED')->sortByDesc('created_at'))
            ->with('tag', $tag);
    }

    /**
     * Display a listing of the user.
     *
     * @param BackpackUser $user
     * @return \Illuminate\Http\Response
     */
    public function user(BackpackUser $user)
    {
        $this->generalSEO($user);
        return view('blog.user')
            ->with('articles', $user->articles->where('status','PUBLISHED')->sortByDesc('created_at'))
            ->with('user', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $this->articleSEO($article);
        $previous = Article::where('id', '<', $article->id)->orderBy('id','desc')->first();
        $next = Article::where('id', '>', $article->id)->orderBy('id')->first();
        return view('blog.article', compact('article', 'previous', 'next'));
    }

    public function articleSEO($article)
    {
        SEOMeta::setTitle($article->title);
        SEOMeta::setDescription($article->description);
        SEOMeta::setCanonical(Url::current());
        SEOMeta::addMeta('article:published_time', $article->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:author', $article->user->name, 'property');
        if ($article->tags)
            SEOMeta::addKeyword($article->tags->map(function ($tag){return $tag->name;})->toArray());

        OpenGraph::setDescription($article->description);
        OpenGraph::setTitle($article->title);
        OpenGraph::setUrl(Url::current());
        OpenGraph::addProperty('type', 'article');
        if ($article->image)
            OpenGraph::addImage(\url($article->image));
        else
            OpenGraph::addImage(asset('logo.png'));


        TwitterCard::setDescription($article->description);
        TwitterCard::setTitle($article->title);
        TwitterCard::setUrl(Url::current());
        TwitterCard::setType('article');
        if ($article->image)
            TwitterCard::addImage(\url($article->image));
        else
            TwitterCard::addImage(asset('logo.png'));
        TwitterCard::setSite('@Mukwz');
    }

    public function generalSEO($entity)
    {
        SEOMeta::setTitle($entity->name);
        SEOMeta::setCanonical(Url::current());

        OpenGraph::setTitle($entity->name);
        OpenGraph::setUrl(Url::current());
        OpenGraph::addProperty('type', 'website');
        if ($entity->image)
            OpenGraph::addImage(\url(Storage::disk('backpack')->url($entity->image->imageable_url)));
        else
            OpenGraph::addImage(asset('logo.png'));



        TwitterCard::setTitle($entity->name);
        TwitterCard::setUrl(Url::current());
    }
}
