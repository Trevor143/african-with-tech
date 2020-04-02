<div class="entry"
     style="background-image:url('{{asset('wheel-2000.jpg')}}')">
    <div class="entry__content">
        <span class="entry__category">
                <a href="#">Empty</a>
        </span>
        <h1>
            <a href="#">Still closed for Business</a>
        </h1>

        <div class="entry__info">
            <a href="#" class="entry__profile-pic">
                <img class="avatar" src="{{asset('user_icon.png')}}" alt="Default user's picture">
            </a>

            <ul class="entry__meta">
                <li><a href="#">Default</a></li>
                <li>{{\Carbon\Carbon::today()->isoFormat('MMMM D, Y')}}</li>
            </ul>
        </div>
    </div> <!-- end entry__content -->
</div> <!-- end entry -->
