<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">
{{--{{$articles}}--}}
            <div class="featured__column featured__column--big">
                <div class="entry"
                     style="background-image:url('{{Storage::disk('front')->url($main_article->image)}}')"
                >

                    <div class="entry__content">
                        <span class="entry__category">
                            @foreach($main_article->category as $key)
                                <a href="{{route('category', $key->slug)}}">{{$key->name}}</a>
                            @endforeach
                        </span>

                        <h1><a href="{{route('article.show', $main_article->slug)}} " title="{{$main_article->title}}">{{$main_article->title}}</a></h1>

                        <div class="entry__info">
                            <a href="{{route('user', $main_article->user->name)}}" class="entry__profile-pic">
                                <img class="avatar" src="{{Storage::disk('backpack')->url($main_article->user->image->imageable_url)}}" alt="{{$main_article->user->name}}'s picture">
                            </a>

                            <ul class="entry__meta">
                                <li><a href="{{route('user', $main_article->user->name)}}">{{$main_article->user->name}}</a></li>
                                <li>{{$main_article->created_at->isoFormat('MMMM D, Y')}}</li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->

                </div> <!-- end entry -->
            </div> <!-- end featured__big -->

            <div class="featured__column featured__column--small">

                <div class="entry" style="background-image:url('{{Storage::disk('front')->url($up_article->image)}}')">

                    <div class="entry__content">
                        <span class="entry__category">
                            @foreach($up_article->category as $key)
                                <a href="{{route('category', $key->slug)}}">{{$key->name}}</a>
                            @endforeach                        </span>

                        <h1><a href="{{route('article.show', $up_article->slug)}} " title="{{$up_article->title}}">{{$up_article->title}}</a></h1>

                        <div class="entry__info">
                            <a href="{{route('user', $up_article->user->name)}}" class="entry__profile-pic">
                                <img class="avatar" src="{{Storage::disk('backpack')->url($up_article->user->image->imageable_url)}}" alt="">
                            </a>

                            <ul class="entry__meta">
                                <li><a href="{{route('user', $up_article->user->name)}}">{{$up_article->user->name}}</a></li>
                                <li>{{$up_article->created_at->isoFormat('MMMM D, Y')}}</li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->

                </div> <!-- end entry -->

                <div class="entry" style="background-image:url('{{Storage::disk('front')->url($down_article->image)}}')">

                    <div class="entry__content">
                        <span class="entry__category">
                            @foreach($down_article->category as $key)
                                <a href="{{route('category', $key->slug)}}">{{$key->name}}</a>
                            @endforeach
                        </span>

                        <h1><a href="{{route('article.show', $down_article->slug)}} " title="{{$down_article->title}}">{{$down_article->title}}</a></h1>

                        <div class="entry__info">
                            <a href="{{route('user', $down_article->user->name)}}" class="entry__profile-pic">
                                <img class="avatar" src="{{Storage::disk('backpack')->url($down_article->user->image->imageable_url)}}" alt="">
                            </a>

                            <ul class="entry__meta">
                                <li><a href="{{route('user', $down_article->user->name)}}">{{$down_article->user->name ?? 'african_with_tech'}}</a></li>
                                <li>{{$down_article->created_at->isoFormat('MMMM D, Y')}}</li>
                            </ul>
                        </div>
                    </div> <!-- end entry__content -->

                </div> <!-- end entry -->

            </div> <!-- end featured__small -->
        </div> <!-- end featured -->

    </div> <!-- end col-full -->
</div>
