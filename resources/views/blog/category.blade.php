@extends('blog.layout.master')

@section('header')
    @include('blog.partials.header')
@endsection

@section('content')
    <section class="s-content">
        @include('blog.partials.posts',['articles'=>$articles])
    </section>
@endsection

@section('seo')
    {!! SEO::generate() !!}

@endsection
