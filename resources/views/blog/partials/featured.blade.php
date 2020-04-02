<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">
            {{--{{$articles}}--}}
            <div class="featured__column featured__column--big">
                @if($main_article)
                    @include('blog.partials.featured_posts',['article'=>$main_article])
                @else
                    @include('blog.partials.default_featured')
                @endif

            </div> <!-- end featured__big -->

            <div class="featured__column featured__column--small">
                @if($up_article)
                    @include('blog.partials.featured_posts',['article'=>$up_article])
                @else
                    @include('blog.partials.default_featured')
                @endif
                @if($down_article)
                    @include('blog.partials.featured_posts',['article'=>$down_article])
                @else
                    @include('blog.partials.default_featured')
                @endif

            </div> <!-- end featured__small -->
        </div> <!-- end featured -->

    </div> <!-- end col-full -->
</div>
