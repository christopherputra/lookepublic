
<!DOCTYPE html>
<html>
<head>
    <title>Home | Looke</title>
    @include('segments.link')
</head>
<body class="homebody">
    @include('segments.navfix')
    <div class="bodycontainer">
        <div class="catcontainer">
            <div class="categoriescontainer">
                <div class="categories">
                    <div class="category">All</div>
                    <div class="category">Clothing</div>
                    <div class="category">Shoes</div>
                    <div class="category catactive">Hype</div>
                    <div class="category">Bags</div>
                    <div class="category">Service</div>
                    <div class="category">Beauty</div>
                </div>
            </div> 
            <div class="leftcat"><img src="images/left.png" class="leftarrow"></div>
            <div class="rightcat"><img src="images/right.png" class="rightarrow"></div>
        </div>
        @foreach($prices as $k => $price)
        @if($k > 0) @break
        @endif
        <a href="detail/{{$price->influencer_id}}" class="topinfluencer">
            <div class="topinfluencerimagegradient">
                <div class="influencerimageblack">
                    <div class="influencerimagecut">
                        <img src="{{App\Cast::image($price->influencer_image,1)}}" class="influencerimage">
                    </div>
                </div>
            </div>
            <div class="influencercontent">
                <div class="topinfluencername">{{strtoupper($price->influencer_name)}}</div>
                <div class="topinfluencerfollower"><img src="images/follower.png" class="topfollowericon"><i>{{$price->influencer_follower.App\Cast::follower($price->influencer_unit)}}</i></div>
            </div>
            <div class="topinfluencerprice">${{$price->price}}</div>
        </a>
        @endforeach
        <div class="filtertitle">filter</div>
        <form class="filtercontainer">
            <input type="hidden" name="keyword" value="@isset($keyword){{$keyword}}@endisset">
            <div class="pricefilter">
                <img src="images/price.png" class="priceicon">
                <div class="priceinputs">
                    <input type="number" id="pricefrominput" class="priceinput" name="pricefrom" value="@isset($pricefrom){{$pricefrom}}@endisset">
                    <div class="tolabel">to</div>
                    <input type="number" id="pricetoinput" class="priceinput" name="priceto" value="@isset($priceto){{$priceto}}@endisset">
                </div>
            </div>
            <div class="separator"></div>
            <div class="followerfilter">
                <div class="priceinputs">
                    <input type="number" id="pricefrominput" class="priceinput" name="follfrom" value="@isset($follfrom){{$follfrom}}@endisset">
                    <div class="tolabel">to</div>
                    <input type="number" id="pricetoinput" class="priceinput" name="follto" value="@isset($follto){{$follto}}@endisset">
                </div>
                <img src="images/follower.png" class="followericon">
            </div>
        </form>
        <div class="influencers">
        @foreach($prices as $k => $price)
            <a href="detail/{{$price->influencer_id}}"  class="influencer">
                <div class="influencerimagegradient">
                    <div class="influencerimageblack">
                        <div class="influencerimagecut">
                            <img src="{{App\Cast::image($price->influencer_image,1)}}" class="influencerimage">
                        </div>
                    </div>
                </div>
                <div class="influencercontent">
                    <div class="influencername">{{strtoupper($price->influencer_name)}}</div>
                    <div class="influencerfollower"><img src="images/follower.png" class="influencerfollowericon"><i>{{$price->influencer_follower.App\Cast::follower($price->influencer_unit)}}</i></div>
                </div>
                <div class="influencerprice">${{$price->price}}</div>
            </a>
        @endforeach
        </div>
    </div>
    <div class="footer">
        <img src="images/logo.png" class="logofooter">
        <div class="footermenus">
            <div class="footermenu">About</div>
            <div class="footermenu">Help & Support</div>
            <div class="footermenu">Terms & Conditions</div>
            <div class="footermenu">Privacy & Policy</div>
        </div>
        <div class="socialmedias">
            <img src="images/facebook.png" class="socialmedia">
            <img src="images/twitter.png" class="socialmedia">
            <img src="images/instagram.png" class="socialmedia">
        </div>
        <div class="copyrights">&copy; Looke all rights reserved</div>
    </div>
</body>
<script src="https://unpkg.com/scrollreveal@4"></script>
<script>
    $(document).ready(function(){
        ScrollReveal().reveal('.influencer,.topinfluencer',{delay:250,origin:'bottom',distance:"50px"});
        var w = $(".category").length*200;
        $(".categories").css({"width":w+"px"});
        var left = ($(".categoriescontainer").width() - $(".category").length*200) / 2;
        $(".categories").css({"left":left+"px"});
        $(".rightarrow").click(function(){
            if(!$(".category").last().hasClass("catactive")){
                left = left-200;
                $(".categories").animate({"left":left+"px"});
                var removeactive = $(".catactive");
                $(".catactive").next().addClass("catactive");
                removeactive.removeClass("catactive");
            }
        });
        $(".leftarrow").click(function(){
            if(!$(".category").first().hasClass("catactive")){
                left = left+200;
                $(".categories").animate({"left":left+"px"});
                var removeactive = $(".catactive");
                $(".catactive").prev().addClass("catactive");
                removeactive.removeClass("catactive");
            }
        });
        $(".priceicon,.followericon").click(function(){
            $(".filtercontainer").submit();
        });
    });
</script>
</html>