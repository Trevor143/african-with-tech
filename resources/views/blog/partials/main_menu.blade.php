<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
<nav class="header__nav-wrap">
    <h2 class="header__nav-heading h6">Site Navigation</h2>
    <ul class="header__nav">
        @forelse($items as $item)
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
        @empty
            <li class="current"><a href="{{route('home')}}">Home</a></li>
        @endforelse
    </ul> <!-- end header__nav -->
    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
</nav> <!-- end header__nav-wrap -->
