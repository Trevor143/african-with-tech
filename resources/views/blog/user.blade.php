@extends('blog.layout.master')

@section('header')
    @include('blog.partials.header')
@endsection

@section('styles')

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 400px;
            /*max-height: 300px;*/
            margin: auto;
            text-align: center;
        }

        .card-title {
            color: grey;
            font-size: 18px;
        }

    </style>

@endsection


@section('content')
    <section class="s-content">
        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                {{--                --}}{{--<div class="s-content__author">--}}
                {{--                @if($user->image)--}}
                {{--                    <img src="{{asset('storage/'.$user->image->imageable_url)}}" alt="{{$user->name}}'s image" class="img-thumbnail">--}}
                {{--                @else--}}
                {{--                    <img src="{{ asset('user_icon.png') }}" alt="{{$user->name}}'s image" height="213" width="320">--}}
                {{--                @endif--}}
                {{--                <div class="s-content__author-about">--}}
                {{--                    <h2 class="s-content__author-name">--}}
                {{--                        {{$user->name}}--}}
                {{--                    </h2>--}}

                {{--                    <p class="lead">--}}
                {{--                        {{$user->description}}--}}
                {{--                    </p>--}}

                {{--                    @if($user->social)--}}
                {{--                        <ul class="s-content__author-social">--}}
                {{--                            @foreach($user->social as $social)--}}
                {{--                                <li><a target="_blank" href="{{$social->social_url}}">{{$social->social_name}}</a></li>--}}
                {{--                            @endforeach--}}
                {{--                        </ul>--}}
                {{--                    @else--}}
                {{--                        <p class="s-content__author-social"> No socials provided</p>--}}
                {{--                    @endif--}}
                {{--                </div>--}}

                <div class="card">
                    @if($user->image)
                        <img src="{{asset('storage/'.$user->image->imageable_url)}}" alt="{{$user->name}}'s image" style="width:100%">
                    @else
                        <img src="{{ asset('user_icon.png') }}" alt="{{$user->name}}'s image" style="width: 100%">
                    @endif
                    <h3>{{$user->name}}</h3>
                    <p class="card-title">{{$user->description}}</p>
                    @if($user->social)
                        @foreach($user->social as $social)
                            <a class="s-content__author-social" target="_blank" href="{{$social->social_url}}">{{$social->social_name}}</a>|
                        @endforeach
                    @else
                        <p class="s-content__author-social"> No socials provided</p>
                    @endif
                </div>

            </div>
        </div>

        @include('blog.partials.posts',['articles'=>$articles])
    </section>
@endsection
