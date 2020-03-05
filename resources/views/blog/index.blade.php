@extends('blog.layout.master')

@section('header')
    @include('blog.partials.home_header')
@endsection

{{--@section('featured')--}}
{{--@endsection--}}

@section('content')
    @include('blog.partials.posts')
@endsection
