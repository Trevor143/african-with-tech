<section class = 's-pageheader s-pageheader--home'>
    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="{{route('home')}}">
                    <img src="{{asset('logo.svg')}}" alt="Homepage">
                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="https://twitter.com/Mukwz"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/that_fat_boy_on_a_mission_/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->

            @include('blog.partials.main_menu', ['items'=> $items])

        </div> <!-- header-content -->
    </header> <!-- header -->

    @include('blog.partials.featured')

</section>
<!-- end pageheader-content row -->
