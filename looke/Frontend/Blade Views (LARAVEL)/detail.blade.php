<!DOCTYPE html>
<html>
<head>
    <title>{{ucwords($influencer->influencer_name)}} | Looke</title>
    @include("segments.link")
</head>
<body class="detailbody">
    @include('segments.navabs')
    <div class="detailoverlay">
        <div class="detailoverlaycontainer">
        <div class="detailclose"><img src="/images/left.png" class="backarrow">back</div>
            <div class="detailoverlaytitle">Choose your package</div>
            <div class="packages">
                <div class="pricerecommendedboxchoose" id="{{$recommended->price_id}}">
                    <div class="pricerecommendedboxnumber">${{$recommended->price}}</div>
                    <div class="priceboxdetails">
                        <div class="priceboxtime"><img src="/images/sun.png" class="sunicon">{{$recommended->duration_days}} days</div>
                        <div class="priceboxtype">{{App\Cast::pricetype($recommended->price_type)}}</div>
                    </div>
                </div>
                @foreach($prices as $price)
                <div class="priceboxchoose" id="{{$price->price_id}}">
                    <div class="priceboxnumber">${{$price->price}}</div>
                    <div class="priceboxdetails">
                        <div class="priceboxtime"><img src="/images/sun.png" class="sunicon">{{$price->duration_days}} days</div>
                        <div class="priceboxtype">{{App\Cast::pricetype($price->price_type)}}</div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="detailoverlaytitle">Fill the details</div>
            <form class="productform" method="post" action="/makeoffer" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="priceselected" name="price_id" value="">
                <div class="productpicturegradient">
                    <div class="productpictureblack">
                        <div class="productpicturecut">
                            <img src="/images/product.jpg" class="productpicture">
                            <div class="uploadfilecontainer">
								<div class="uploadproductcontainer">UPLOAD</div>
								<input type="file" class="filebutton" name="image">
							</div>
                        </div>
                    </div>
                </div>
                <div class="productformright">
                    <div class="notetitle">Write down your note</div>
                    <textarea class="note" name="description" placeholder="Item name, special captions, keywords to say, when the item will be delivered"></textarea>
                </div>
                <div class="datecontainer">
                    Post on
                    <input type="date" name="post_date" class="dateinput" min="{{$minoffer}}">
                </div>
                @if(session("type")!=2)
                <div class="loginrequire">You have to log in as <a href="/welcome" class="detailloginbutton">Seller</a></div>
                <input type="submit" value="OFFER" class="offerbuttondisabled" disabled>
                @else
                <input type="submit" value="OFFER" class="offerbutton">
                @endif
            </form>
        </div>
    </div>
    <div class="navinfluencer">
        <div class="navinfluencerbg"></div>
        <div class="detailinfluencerimagegradient">
            <div class="influencerimageblack">
                <div class="influencerimagecut">
                    <img src="{{App\Cast::image($influencer->influencer_image,1)}}" class="influencerimage">
                </div>
            </div>
        </div>
        <div class="detailinfluencercontent">
            <div class="detailinfluencername">{{strtoupper($influencer->influencer_name)}}</div>
            <div class="detailinfluencerfollower"><img src="/images/follower.png" class="detailfollowericon"><i>{{$influencer->influencer_follower.App\Cast::follower($influencer->influencer_unit)}}</i><div class="wantinfluencer">I WANT YOU</div></div>
        </div>
        <a href="https://www.instagram.com/{{$influencer->influencer_instagram}}" class="detailinfluencerlinks">
            <img src="/images/instagram.png" class="detailinfluencerinsta">
            {{$influencer->influencer_instagram}}
        </a>
    </div>
    <div class="detailbodycontainer">
        <div class="totalpostcontainer">
            <div class="totalpost">102 posts</div>
            <div class="totalsatisfied">
                <img src="/images/thumb.png" class="satisfiedicon">
                90% satisfied
            </div>
        </div>
        <div class="pricescontainer">
            <div class="pricerecommendedbox">
                <div class="pricerecommendedboxnumber">${{$recommended->price}}</div>
                <div class="priceboxdetails">
                    <div class="priceboxtime"><img src="/images/sun.png" class="sunicon">{{$recommended->duration_days}} days</div>
                    <div class="priceboxtype">{{App\Cast::pricetype($recommended->price_type)}}</div>
                </div>
                <div class="wantpricebutton">WANT</div>
            </div>
            @foreach($prices as $k => $price)
            @if($k > 1) @break
            @endif
            <div class="pricebox">
                <div class="priceboxnumber">${{$price->price}}</div>
                <div class="priceboxdetails">
                    <div class="priceboxtime"><img src="/images/sun.png" class="sunicon">{{$price->duration_days}} days</div>
                    <div class="priceboxtype">{{App\Cast::pricetype($price->price_type)}}</div>
                </div>
                <div class="wantpricebutton">WANT</div>
            </div>
            @endforeach
        </div>
        <div class="testimoniestitle">Testimonies</div>
        <div class="testimoniescontainer">
            <div class="testimonymore"><div class="testimonyshowbutton">Show more</div></div>
            <div class="testimony">
                <div class="testimonyhead"><div class="testimonyname">ZARA</div><div class="testimonydate">25 jan 2020</div></div>
                <div class="testimonycontent">"Very professional. Don't hesitate to hire this influencer. Already got the benefit from hiring this influencer."</div>
                <img src="/images/thumb.png" class="testimonyicon">
            </div>
            <div class="testimony">
                <div class="testimonyhead"><div class="testimonyname">ZARA</div><div class="testimonydate">25 jan 2020</div></div>
                <div class="testimonycontent">"Very professional. Don't hesitate to hire this influencer. Already got the benefit from hiring this influencer."</div>
                <img src="/images/thumb.png" class="testimonyicon">
            </div>
            <div class="testimony">
                <div class="testimonyhead"><div class="testimonyname">ZARA</div><div class="testimonydate">25 jan 2020</div></div>
                <div class="testimonycontent">"Very professional. Don't hesitate to hire this influencer. Already got the benefit from hiring this influencer."</div>
                <img src="/images/thumb.png" class="testimonyicon">
            </div>
        </div>
    </div>
</body>
<script src="/tilt.jquery.js"></script>
<script>
    $(document).ready(function(){
        $(".pricerecommendedbox").tilt();
        $(".wantpricebutton,.wantinfluencer").click(function(){
            $(".detailoverlay").fadeIn();
            $(".navinfluencer").animate({"top":"-70px"});
        });
        $(".detailclose").click(function(){
            $(".detailoverlay").fadeOut();
            $(".navinfluencer").animate({"top":$(window).height()-300+"px"});
        });
        $(".priceboxchoose,.pricerecommendedboxchoose").click(function(){
            $(".priceboxchosen").removeClass("priceboxchosen");
            $(".priceselected").val($(this).attr("id"));
            $(this).addClass("priceboxchosen");
        });
		function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function(e) {
					$(".productpicture").attr('src', e.target.result);
					}
					
					reader.readAsDataURL(input.files[0]);
				}
			}

			$(".filebutton").change(function() {
				readURL(this);
			});
    });
</script>
</html>