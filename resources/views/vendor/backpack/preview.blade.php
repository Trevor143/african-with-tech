@extends('blog.layout.master')

@section('header')
    @include('blog.partials.header')
@endsection

@section('content')
    <section class="s-content s-content--narrow s-content--no-padding-bottom">
        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    {{$article->title}}
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date">{{$article->created_at->isoFormat('MMMM D, YYYY')}}</li>
                    <li class="cat">
                        In
                        @foreach($article->category as $category)
                            <a href="{{route('category', $category->slug)}}">{{$category->name}}</a>
                        @endforeach
                    </li>
                </ul>
            </div> <!-- end s-content__header -->

            <div class="s-content__media col-full">
                @if($article->image)
                    <div class="s-content__post-thumb">
                        <img src="{{Storage::disk('front')->url($article->image)}}"
                             srcset="{{Storage::disk('front')->url($article->image)}} 2000w,
                                     {{Storage::disk('front')->url($article->image)}} 1000w,
                                     {{Storage::disk('front')->url($article->image)}} 500w"
                             sizes="(max-width: 2000px) 100vw, 2000px" alt="Article image" >
                    </div>
                @endif
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                {!! $article->content !!}

                @if($article->tags)
                    <p class="s-content__tags">
                        <span>Post Tags</span>

                        <span class="s-content__tag-list">
                    @foreach($article->tags as $tag)
                                <a href="#0">{{$tag->name}}</a>
                            @endforeach
                    </span>
                    </p>
            @endif
            <!-- end s-content__tags -->

                <div class="s-content__author">
                    @if($article->user->image)
                        <img src="{{asset('storage/'.$article->user->image->imageable_url)}}" alt="{{$article->user->name}}'s picture">
                    @else
                        <img src="{{asset('user_icon.png')}}" alt="{{$article->user->name}}'s picture">
                    @endif
                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="{{route('user', $article->user->name)}}">{{$article->user->name}}</a>
                        </h4>

                        <p>
                            {{$article->user->description}}
                        </p>

                        @if($article->user->social)
                            <ul class="s-content__author-social">
                                @foreach($article->user->social as $social)
                                    <li><a href="{{$social->social_url}}">{{$social->social_name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">
                        <div class="s-content__prev">
                            <a href="#" rel="prev">
                                <span>Previous Post</span>
                                Tips on Minimalist Design
                            </a>
                        </div>
                        <div class="s-content__next">
                            <a href="#" rel="next">
                                <span>Next Post</span>
                                Less Is More
                            </a>
                        </div>
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>
    </section>
@endsection
