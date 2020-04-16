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
                        @if(isset($previous))
                            <div class="s-content__prev">
                                <a href="{{route('article.show', $previous->slug)}}" rel="prev">
                                    <span>Previous Post</span>
                                    {{$previous->title}}
                                </a>
                            </div>
                        @endif
                        @if(isset($next))
                            <div class="s-content__next">
                                <a href="{{route('article.show', $next->slug)}}" rel="next">
                                    <span>Next Post</span>
                                    {{$next->title}}
                                </a>
                            </div>
                        @endif
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>

        <!-- comments
      ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">Comments</h3>

                    <div id="disqus_thread"></div>
                    <script>

                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                        var disqus_config = function () {
                        this.page.url = '{{Request::url()}}';  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = '{{$article->slug}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://african-with-tech.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                </div>
            </div>
        </div>
    </section>
@endsection
