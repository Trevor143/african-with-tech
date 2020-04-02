<div class="entry" style="background-image:url('{{Storage::disk('front')->url($article->image)}}')">
    <div class="entry__content">
        <span class="entry__category">
            @foreach($article->category as $key)
                <a href="{{route('category', $key->slug)}}">{{$key->name}}</a>
            @endforeach
        </span>
        <h1>
            <a href="{{route('article.show', $article->slug)}} " title="{{$article->title}}">{{$article->title}}</a>
        </h1>

        <div class="entry__info">
            <a href="{{route('user', $article->user->name)}}" class="entry__profile-pic">
                <img class="avatar" src="{{Storage::disk('backpack')->url($article->user->image->imageable_url)}}" alt="{{$article->user->name}}'s picture">
            </a>

            <ul class="entry__meta">
                <li><a href="{{route('user', $article->user->name)}}">{{$article->user->name}}</a></li>
                <li>{{$article->created_at->isoFormat('MMMM D, Y')}}</li>
            </ul>
        </div>
    </div> <!-- end entry__content -->
</div> <!-- end entry -->
