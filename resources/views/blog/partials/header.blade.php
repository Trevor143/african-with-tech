<div class = 's-pageheader'>
    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="{{route('home')}}">
                    <img src="{{asset('logo.svg')}}" alt="Homepage">
                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->

            @include('blog.partials.main_menu', ['items'=> $items])

        </div> <!-- header-content -->
    </header> <!-- header -->
</div>
<!-- end pageheader-content row -->
