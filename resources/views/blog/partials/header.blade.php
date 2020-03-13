


<div class = 's-pageheader'>
    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="index.html">
                    <img src="images/logo.svg" alt="Homepage">
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


            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            <nav class="header__nav-wrap">
                <h2 class="header__nav-heading h6">Site Navigation</h2>
                <ul class="header__nav">
                    @foreach($items as $item)
                        @php
                            $isActive = null;
                            $hasChildren = null;

                            // Check if link is current
                            if(url($item->url()) == url()->current()){
                            $isActive = 'current';
                            }

                            //check if link has children
                            if ($item->children->isEmpty()){
                            $hasChildren = null;
                            } else{
                            $hasChildren = 'has-children';
                            }
                        @endphp
                        @if(!$item->parent)
                            <li class="{{$isActive}} {{$hasChildren}}"><a href="{{url($item->url())}}">{{$item->name}}</a>
                                @php
                                    $submenu = $item->children;
                                @endphp

                                @if(!$item->children->isEmpty())
                                    <ul class="sub-menu">
                                        @foreach($submenu as $item)
                                            <li><a href="{{url($item->url())}}">{{$item->name}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul> <!-- end header__nav -->

                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </div> <!-- header-content -->
    </header> <!-- header -->
</div>
<!-- end pageheader-content row -->
