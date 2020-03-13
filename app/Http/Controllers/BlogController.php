<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Models\BackpackUser;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('status', 'PUBLISHED')->get();

        return view('blog.index')->with('articles', $articles);
    }

    public function category(Category $category)
    {
        return view('blog.category')
            ->with('articles', $category->articles->where('status','PUBLISHED'))
            ->with('category', $category);

    }

    public function tag(Tag $tag)
    {
        return view('blog.category')
            ->with('articles', $tag->articles->where('status','PUBLISHED'))
            ->with('tag', $tag);

    }

    public function user(BackpackUser $user)
    {
        return view('blog.user')
            ->with('articles', $user->articles->where('status','PUBLISHED'))
            ->with('user', $user);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('blog.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
