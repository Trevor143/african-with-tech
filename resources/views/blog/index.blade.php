@extends('blog.layout.master')

@section('header')
    @include('blog.partials.home_header')
@endsection

{{--@section('featured')--}}
{{--@endsection--}}

@section('content')
    <section class="s-content">
        @include('blog.partials.posts',['articles'=>$articles])
    </section>
@endsection
