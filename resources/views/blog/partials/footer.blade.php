<footer class="s-footer">

    <div class="s-footer__main">
        <div class="row">

            <div class="col-two md-four mob-full s-footer__sitelinks">

                <h4>Quick Links</h4>

                <ul class="s-footer__linklist">
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
                            <li class="{{$isActive}}"><a href="{{url($item->url())}}">{{$item->name}}</a>
                            </li>
                        @endif
                    @empty
                        <li class="current"><a href="{{route('home')}}">Home</a></li>
                    @endforelse
                </ul> <!-- end footer__nav -->


            </div> <!-- end s-footer__sitelinks -->

{{--            <div class="col-two md-four mob-full s-footer__archives">--}}

{{--                <h4>Archives</h4>--}}

{{--                <ul class="s-footer__linklist">--}}
{{--                    <li><a href="#0">January 2018</a></li>--}}
{{--                    <li><a href="#0">December 2017</a></li>--}}
{{--                    <li><a href="#0">November 2017</a></li>--}}
{{--                    <li><a href="#0">October 2017</a></li>--}}
{{--                    <li><a href="#0">September 2017</a></li>--}}
{{--                    <li><a href="#0">August 2017</a></li>--}}
{{--                </ul>--}}

{{--            </div> <!-- end s-footer__archives -->--}}

            <div class="col-two md-four mob-full s-footer__social">

                <h4>Social</h4>

                <ul class="s-footer__linklist">
                    <li><a href="https://www.instagram.com/that_fat_boy_on_a_mission_/">Instagram</a></li>
                    <li><a href="https://twitter.com/Mukwz">Twitter</a></li>
                </ul>

            </div> <!-- end s-footer__social -->

{{--            <div class="col-five md-full end s-footer__subscribe">--}}

{{--                <h4>Our Newsletter</h4>--}}

{{--                <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>--}}

{{--                <div class="subscribe-form">--}}
{{--                    <form id="mc-form" class="group" novalidate="true">--}}

{{--                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">--}}

{{--                        <input type="submit" name="subscribe" value="Send">--}}

{{--                        <label for="mc-email" class="subscribe-message"></label>--}}

{{--                    </form>--}}
{{--                </div>--}}

{{--            </div> <!-- end s-footer__subscribe -->--}}

        </div>
    </div> <!-- end s-footer__main -->

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span>© Copyright african_with_tech {{\Carbon\Carbon::today()->isoFormat('YYYY')}}</span>
                    <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div> <!-- end s-footer__bottom -->

</footer>
