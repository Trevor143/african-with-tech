<section class="s-extra">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <h3>Popular Posts</h3>

            <div class="block-1-2 block-m-full popular__posts">
                @forelse($articles as $article)
                    <article class="col-block popular__post">
                        @if($article->image)
                            <a href="{{route('article.show', $article->slug)}}" class="popular__thumb">
                                <img src="{{Storage::disk('front')->url($article->image)}} " alt="Post image">
                            </a>
                        @else
                            <a href="{{route('article.show', $article->slug)}}" class="popular__thumb">
                                <img src="{{asset('logo2.png')}} " alt="Post image">
                            </a>
                        @endif
                        <h5><a href="{{route('article.show', $article->slug)}}">{{\Illuminate\Support\Str::limit($article->title, 70)}}</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> {{$article->user->name}} </a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-19">{{$article->created_at->isoFormat('MMMM D, YYYY')}}</time></span>
                        </section>
                    </article>
                @empty
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="{{asset('logo2.png')}}" alt="Post image">
                        </a>
                        <h5><a href="#0">No posts avaliable</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0"> african_with_tech</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2017-12-19">{{\Carbon\Carbon::today()->isoFormat('MMMM D, YYYY')}}</time></span>
                        </section>
                    </article>
                @endforelse
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->

        <div class="col-four md-six tab-full about">
            <h3>About african_with_tech</h3>

            <p>
                african_with_tech is a platform to easily view any kind of technology, new or old in an African perspective for the common person.
            </p>

            <ul class="about__social">
                <li>
                    <a href="https://twitter.com/Mukwz"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/that_fat_boy_on_a_mission_/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->
        </div> <!-- end about -->

    </div> <!-- end row -->

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Tags</h3>

            <div class="tagcloud">
                @forelse($tags as $tag)
                    <a href="#0">{{$tag->name}}</a>
                @empty
                    <a href="#0">Tags</a>
                @endforelse
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

</section>
