@extends('blog.layout.master')

@section('header')
    @include('blog.partials.header')
@endsection

@section('content')
    <section class="s-content">
        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                {{--<div class="s-content__author">--}}
                @if($user->image)
                    <img src="{{Storage::disk('backpack')->url($user->image->imageable_url)}}" alt="{{$user->name}}'s image">
                @else
                    <img src="{{ asset('user_icon.png') }}" alt="{{$user->name}}'s image" width="200" height="40">
                @endif
                    <div class="s-content__author-about">
                    <h2 class="s-content__author-name">
                        {{$user->name}}
                    </h2>

                    <p class="lead">
                        {{$user->description}}
                    </p>

                    @if($user->social)
                        <ul class="s-content__author-social">
                            @foreach($user->social as $social)
                                <li><a target="_blank" href="{{$social->social_url}}">{{$social->social_name}}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p class="s-content__author-social"> No socials provided</p>
                    @endif
                </div>
            </div>
        </div>

        @include('blog.partials.posts',['articles'=>$articles])
    </section>
@endsection
