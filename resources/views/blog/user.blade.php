@extends('blog.layout.master')

@section('header')
    @include('blog.partials.header')
@endsection

@section('content')
    <section class="s-content">
        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                {{--<div class="s-content__author">--}}
                <img src="{{Storage::disk('backpack')->url($user->image->imageable_url)}}" alt="{{$user->name}}'s image">
                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        {{$user->name}}
                    </h4>

                    <p>
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


