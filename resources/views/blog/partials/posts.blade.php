<div class="row masonry-wrap">
    <div class="masonry">

        <div class="grid-sizer"></div>

        @forelse($articles as $article)
            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                @if($article->image)
                    <div class="entry__thumb">
                        <a href="{{route('article.show', $article->slug)}}" class="entry__thumb-link">
                            <img src="{{Storage::disk('front')->url($article->image)}}"
                                 srcset="{{Storage::disk('front')->url($article->image)}} 1x,
                             {{Storage::disk('front')->url($article->image)}} 2x" alt="">
                        </a>
                    </div>
                @endif

                <div class="entry__text">
                    <div class="entry__header">

                        <div class="entry__date">
                            {{--                            <a href="single-standard.html">--}}
                            {{$article->created_at->isoFormat('MMMM D, YYYY')}}
                            {{--                            </a>--}}
                        </div>
                        <h1 class="entry__title"><a href="{{route('article.show', $article->slug)}} ">{{$article->title}}</a></h1>

                    </div>
                    <div class="entry__excerpt">
                        <p>
                            {{$article->description}}
                        </p>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                            @if($article->category)
                                @foreach ($article->category as $value)
                                    <a href="{{route('category', $value->slug)}}">{{$value->name}}</a>
                                @endforeach
                            @else
                                <a href="{{route('category', $category->slug)}}">{{$category->name}}</a>
                            @endif
                        </span>
                    </div>
                </div>

            </article> <!-- end article -->
        @empty
            <article class="masonry__brick entry format-standard" data-aos="fade-up">
                <div class="entry__text">
                    <div class="entry__header">

                        <div class="entry__date">
                            {{\Carbon\Carbon::today()->isoFormat('MMMM D, YYYY')}}
                        </div>
                        <h1 class="entry__title">No New Posts at all</h1>

                    </div>
                    <div class="entry__excerpt">
                        <p>
                            It is very odd but I unfortunately have no posts to show off to the world. Give me a minute.
                        </p>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                            No Category
                        </span>
                    </div>
                </div>
            </article>
        @endforelse
    </div> <!-- end masonry -->
</div> <!-- end masonry-wrap -->
