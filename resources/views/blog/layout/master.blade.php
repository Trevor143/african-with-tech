<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">

{!! SEO::generate() !!}

<!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161411659-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{env('ANALYTICS_TRACKING_ID')}}');
    </script>
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('blog/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('blog/css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('blog/css/main.css')}}">

    <!-- script
    ================================================== -->
    <script src="{{asset('blog/js/modernizr.js')}}"></script>
    <script src="{{asset('blog/js/pace.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{asset('faviconstable.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('faviconstable.ico')}}" type="image/x-icon">

@yield('styles')


</head>

<body id="top">

<!-- pageheader
================================================== -->
@yield('header')
<!-- end s-pageheader -->


<!-- s-content
================================================== -->
{{--    <section class="s-content">--}}
@yield('content')
{{--    </section>--}}
<!-- s-content -->


<!-- s-extra
================================================== -->
        @include('blog.partials.extra')
<!-- end s-extra -->


<!-- s-footer
================================================== -->
@include('blog.partials.footer')
<!-- end s-footer -->


<!-- preloader
================================================== -->
{{--    <div id="preloader">--}}
{{--        <div id="loader">--}}
{{--            <div class="line-scale">--}}
{{--                <div></div>--}}
{{--                <div></div>--}}
{{--                <div></div>--}}
{{--                <div></div>--}}
{{--                <div></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


<!-- Java Script
    ================================================== -->
<script src="{{asset('blog/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('blog/js/plugins.js')}}"></script>
<script src="{{asset('blog/js/main.js')}}"></script>

@yield('script')

</body>

</html>
