
        <div class="navbg"></div>
        <a href="/home"><img src="/images/logo.png" class="logo"></a>
        <div class="rightnav">
            @if(session("type")==1)
            <div class="navprofile">
                <div class="navprofileinfluencerimagegradient">
                    <div class="influencerimageblack">
                        <div class="influencerimagecut">
                            <img src="{{App\Cast::image(session('influencer_image'),1)}}" class="influencerimage">
                        </div>
                    </div>
                </div>
            </div>
            @elseif(session("type")==2)
            <div class="navprofile">
                <div class="businesspicturegradient">
                    <div class="businesspictureblack">
                        <div class="businesspicturecut">
                            <img src="{{App\Cast::image(session('business_image'),2)}}" class="businesspicture">
                        </div>
                    </div>
                </div>
            </div>
            @else
            <a href="/welcome" class="navsignin">SIGN IN</a>
            @endif
            <form class="searchform" action="/home" autocomplete="off">
                <input type="submit" class="searchsubmit" value="">
                <input type="text" placeholder="Search" class="searchinput" name="keyword" value="@isset($keyword){{$keyword}}@endisset">
            </form>
        </div>
            @if(session("type")==1)
            <div class="navmenus">
                <div class="navmenubg"></div>
                <a href="/offered" class="navmenu">My Offers</a>
                <a href="/profile"  class="navmenu">Profile</a>
                <a href="/logout"  class="navmenu">Logout</a>
            </div>
            @elseif(session("type")==2)
            <div class="navmenus">
                <div class="navmenubg"></div>
                <a href="/offers" class="navmenu">My Offering</a>
                <a href="/profilebusiness"  class="navmenu">Profile</a>
                <a href="/logout"  class="navmenu">Logout</a>
            </div>
            @endif
            <script>
            </script>