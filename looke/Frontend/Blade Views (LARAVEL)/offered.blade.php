<!DOCTYPE html>
<html>
<head>
    <title>My Offers | Looke</title>
    @include("segments/link")
</head>
<body class="homebody">
        @include("segments.navfix")
    <div class="uploadproofoverlay">
        <div class="uploadproofclose"></div>
        <div class="uploadtitle">Link your post <div class="helpbutton">?</div></div>
            <div class="steps">
                <div class="step">
                    <div class="stepnumber">STEP 1</div>
                    <div class="steptitle">Open Instagram</div>
                    <div class="stepdescription">Open your <a href="instagram.com" class="stepinsta">Instagram</a> on website, then go to your post.</div>
                </div>
                <div class="step stepcenter">
                    <div class="stepnumber">STEP 2</div>
                    <div class="steptitle">Copy the ID</div>
                    <div class="stepdescription">Copy the post ID in your URL.</div>
               
                </div>
                <div class="step">
                    <div class="stepnumber">STEP 3</div>
                    <div class="steptitle">Paste</div>
                    <div class="stepdescription">Paste it in the field bellow.</div>
                </div>
            </div>
        <form class="uploadform" method="post">
            @csrf
            <input type="hidden" class="uploadid" name="offer_id" value="">
            <div class="urlprefix">https://www.instagram.com/p/</div>
            <input type="text" class="urlinput" placeholder="Your insta post ID" name="instaurl" required>
            <input type="submit" class="urlsubmit" value="SUBMIT">
        </form>
    </div>
    <div class="offeredbodycontainer">
        <div class="offeredtitle">Offered to you</div>
        <div class="offeredcontainer">
            @if(count($offereds)>3)
            <div class="offeredmore"><div class="offeredshowbutton">Show more</div></div>
            @elseif(count($offereds)==0)
            <div class="emptytag">There are no offers for you</div>
            @endif
            @foreach($offereds as $offered)
            <div class="offered" id="offered{{$offered->offer_id}}">
                <div class="productpicturegradient">
                    <div class="productpictureblack">
                        <div class="productpicturecut">
                            <img src="{{App\Cast::image($offered->offer_image,3)}}" class="productpicture">
                        </div>
                        <div class="businesscut">
                            <img src="{{App\Cast::image($offered->business_image,2)}}" class="productpicture">
                        </div>
                    </div>
                </div>
                <div class="offereddetailcontainer">
                    <div class="offeredhead">
                        <div class="offeredname">{{$offered->business_name}}</div>
                        <div class="offeredtype">in {{App\Cast::pricetype($offered->price_type)}}</div>
                    </div>
                    <div class="offereddetail">{{$offered->description}}</div>
                    <div class="offeredbuttons">
                        <div class="offeredtakebutton" id="{{$offered->offer_id}}">TAKE IT</div>
                        <div class="offeredleavebutton" id="{{$offered->offer_id}}">LEAVE IT</div>
                    </div>
                </div>
                <div class="offeredpricecontainer">
                    <div class="offeredprice">${{$offered->price}}</div>
                    <div class="offeredexpire">expiring in {{App\Cast::expire($offered->expiration_date)}}</div>
                    <div class="posttime">{{date("d M Y",strtotime($offered->post_date))}}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="offeredtitle">Taken offers</div>
        <div class="takencontainer"> 
            @if(count($takens)>3)
            <div class="offeredmore"><div class="offeredshowbutton">Show more</div></div>
            @elseif(count($takens)==0)
            <div class="emptytag">There are no taken offers</div>
            @endif
            @foreach($takens as $taken)
            <div class="offered" id="offered{{$taken->offer_id}}">
                <div class="productpicturegradient">
                    <div class="productpictureblack">
                        <div class="productpicturecut">
                            <img src="{{App\Cast::image($taken->offer_image,3)}}" class="productpicture">
                        </div>
                        <div class="businesscut">
                            <img src="{{App\Cast::image($taken->business_image,2)}}" class="productpicture">
                        </div>
                    </div>
                </div>
                <div class="takendetailcontainer">
                    <div class="takenduedate">@if($taken->post_date == Carbon\Carbon::now()->format('Y-m-d')) TODAY @else {{date("d M Y",strtotime($taken->post_date))}} @endif</div>
                    <div class="offeredhead">
                        <div class="offeredname">{{$taken->business_name}}</div><div class="offeredtype">in {{App\Cast::pricetype($taken->price_type)}}</div>
                    </div>
                    <div class="takendetail">{{$taken->description}}</div>
                    <div class="takenbottom">
                        @if($taken->status == 2)
                        <div class="takenuploadedbutton" id="{{$taken->offer_id}}" data-insta="{{$taken->proof}}"><img src="/images/change.png" class="changebutton"></div>
                        <div class="confirmexpire">confirmed in {{App\Cast::expire($taken->confirmation_date)}}</div>
                        @else
                        <div class="takenuploadbutton" id="{{$taken->offer_id}}">UPLOAD PROOF</div>
                        @endif
                        <div class="takenprice">${{$taken->price}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="offeredtitle">Finished offers</div>
        <div class="finishedcontainer">
            <div class="finishedright"><img src="images/right.png" class="rightfinished"></div>
            <div class="finisheds">
                @foreach($finisheds as $finished)
                <div class="finished">
                    <div class="finishedproductpicturegradient">
                        <div class="productpictureblack">
                            <div class="productpicturecut">
                                <img src="{{App\Cast::image($finished->offer_image,3)}}" class="productpicture">
                            </div>
                            <div class="businesscut">
                                <img src="{{App\Cast::image($finished->business_image,2)}}" class="productpicture">
                            </div>
                        </div>
                    </div>
                    <div class="finisheddate">{{date("d M",strtotime($finished->confirmation_date))}}</div>
                </div>
                @endforeach
            </div>
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
<script src="tilt.jquery.js"></script>
<script src="https://unpkg.com/scrollreveal@4"></script>
<script>
$(document).ready(function(){
        ScrollReveal().reveal('.offered,.offeredmore',{delay:250,origin:'right',distance:"50px"});
        ScrollReveal().reveal('.finished',{delay:250,rotate: {y: 20}});
    $(".finisheds").width($(".finished").length*280);
            left = 0;
            $(".rightfinished").click(function(){
                if($(".finisheds").width() - left > $(".finishedcontainer").width()-280){
                    left += 280;
                    $(".finisheds").animate({"margin-left":"-"+left+"px"});
                }
                else{
                    console.log("max");
                }
            });
    $(".uploadproofclose").click(function(){
        $(".uploadproofoverlay").fadeOut();
    });
    $(".helpbutton").click(function(){
        $(".steps").slideToggle();
    });
    $(".takenuploadbutton").click(function(){
        $(".uploadid").val($(this).attr("id"));
        $(".urlsubmit").removeClass("urlsubmited");
        $(".urlinput").val("");
        $(".uploadproofoverlay").fadeIn();
    });
    $(".offeredtakebutton").click(function(){
        var id = $(this).attr("id");
			$.ajax({
				url: "/takeoffer",
				type: "GET",
				data: {"id":id},
				success: function(data){
					if(data == "success"){
                        $("#offered"+id).fadeOut(function(){
                            window.location.href = "/offered";
                        });
					}
                    else{
                        window.location.href = "/welcome";
                    }
				}
			});
    });
    $(".offeredleavebutton").click(function(){
        var id = $(this).attr("id");
			$.ajax({
				url: "/leaveoffer",
				type: "GET",
				data: {"id":id},
				success: function(data){
					if(data == "success"){
                        $("#offered"+id).slideUp(function(){
                            window.location.href = "/offered";
                        });
					}
                    else{
                        window.location.href = "/welcome";
                    }
				}
			});
    });
    $(".uploadform").submit(function(e){
        var id = $(".uploadid").val();
        e.preventDefault();
        $.ajax({
				headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  				},
				url: "/uploadproof",
				type: "POST",
				data: $(this).serialize(),
				success: function(data){
					if(data == "success"){
                        $(".urlsubmit").val("SUBMITED");
                        $(".urlsubmit").addClass("urlsubmited");
                        $(".uploadproofoverlay").delay(500).fadeOut(function(){
                        });
                            $("#"+id).delay(500).fadeOut(function(){
                                $(this).data("insta",$(".urlinput").val());
                                $(this).html("<img src='/images/change.png' class='changebutton'>");
                                $(this).removeClass().addClass("takenuploadedbutton");
                                $(this).fadeIn();
                                $(".urlsubmit").val("SUBMIT");
                            });
					}
                    else{
                        //window.location.href = "/welcome";
                    }
				}
			});
    });
    $(".takenuploadedbutton").click(function(){
        $(".uploadid").val($(this).attr("id"));
        $(".urlinput").val($(this).data("insta"));
        $(".urlsubmit").removeClass("urlsubmited");
        $(".uploadproofoverlay").fadeIn();
    });
});
</script>
</html>