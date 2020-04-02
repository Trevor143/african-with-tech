@extends('blog.layout.master')

@section('header')
    @include('blog.partials.header')
@endsection

@section('content')
    <section class="s-content">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1>Category: {{$category->name}}</h1>

{{--                <p class="lead">Dolor similique vitae. Exercitationem quidem occaecati iusto. Id non vitae enim quas error dolor maiores ut. Exercitationem earum ut repudiandae optio veritatis animi nulla qui dolores.</p>--}}
            </div>
        </div>

        @include('blog.partials.posts',['articles'=>$articles])
    </section>
@endsection
